<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 5/1/2017
 * Time: 4:42 PM
 */

class MailController extends Controller
{
    function __construct()
    {
        $this->_f3 = Base::instance();
    }
    function sendLaws(){
        $subject = "New Subscriber for HR Laws";
        $name  = $this->_f3->get('POST.name');
        $email = $this->_f3->get('POST.email');
        $location = $this->_f3->get('POST.location');
        $phone = $this->_f3->get('POST.phone');

        // send an email to the subscriber
        $from = new SendGrid\Email("CavnessHR", $this->_f3->get('user'));
        $subject = "HR Laws for Your Region";
        $to = new SendGrid\Email($name, $email);

        $body = "<h1>HR Laws for ";
        if ($location == "Tacoma") {
            $body = $body . "Tacoma";
        } else if ($location =="Seattle") {
            $body = $body . "Seattle";
        } else {
            $body = $body . "Washington State";
        }

        $body = $body . "</h1>";

        $body = $body . "<p>Dear " . $name . ",</p>";
        $body = $body . "<p>Thank you for requesting a copy of your regional HR laws. Here are the HR laws that you are required to follow based on the number of employees n your company.</p>";
        $body = $body . "<p>As an additional gift, we would like to provide you with an <a href=\"#\">employee handbook</a> for your company.</p>";
        $body = $body . "<p>Please feel free to reach out to us at <a href=\"mailto:jasoncavness@cavnesshr.com\">jasoncavness@cavnesshr.com</a> or <a href=\"#\">sign up</a> for a profile on our website.</p>";
        $body = $body . "<p>Sincerely,</p><br><br>";
        $body = $body . "<p>Jason Cavness</p>";


        $content = new SendGrid\Content("text/html", $body);

        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $sg = new \SendGrid($this->_f3->get('sendgrid_api_key'));
        $response = $sg->client->mail()->send()->post($mail);

        // save the subscriber information to the database
        $this->saveSubscriberToDatabase($name, $email, $location, $phone);

        // notify the business admin
        $subject = "New Subscriber for HR Laws";
        $to = new SendGrid\Email("Jason Cavness", "jasoncavness@cavnesshr.com");
        $message = "Someone named " . $name . " with the email address " . $email . " from " . $location . " has signed up to receive a copy of HR Laws.";
        $content = new SendGrid\Content("text/plain", $message);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $response = $sg->client->mail()->send()->post($mail);

        // show the subscriber a confirmation
        $this->laws_confirmation();
    }

    function saveSubscriberToDatabase($name, $email, $location, $phone) {
        $dbConnection = new mysqli($this->_f3->get("dbservername"),
            $this->_f3->get("dbuser"),
            $this->_f3->get("dbpassword"),
            $this->_f3->get("databasename"));

        $name = $dbConnection->real_escape_string($name);
        $email = $dbConnection->escape_string($email);
        $location = $dbConnection->escape_string($location);
        $phone = $dbConnection->escape_string($phone);

        $name = explode(" ", $name);
        $first_name = $name[0];
        $last_name = $name[sizeof($name) - 1];
        $phone = str_replace("-", "", $phone);

        if ($dbConnection->connect_errno) {
            printf("Connect failed: %s\n", $dbConnection->connect_error);
            exit();
        }
        $statement = "INSERT INTO customer (first_name, last_name, email, location, phone_number) VALUES ('". $first_name ."', '". $last_name ."', '". $email ."', '". $location . "', ";
        if (strlen($phone) == 10)
            $statement = $statement . "'" . $phone . "'";
        else
            $statement = $statement . "NULL";
        $statement = $statement . ")";
        $dbConnection->query($statement);
    }

    function getContact(){

        $emailSubject = "Someone has contacted you";

        $mailer = new Mailer($this->_f3->get("adminEmail"),$emailSubject);
        $mailer->send(Template::instance()->render('mail/contact_message.html'));

        $this->contact_confirmation();
    }

    function laws_confirmation(){
        $this->_f3->set('confirm_message', 'Your HR laws are on the way');
        $this->loadDefaultView('public/confirmation_page.html', 'HR laws');
    }

    function contact_confirmation(){
        $this->_f3->set('confirm_message', 'Thanks for contacting us. We will be in touch');
        $this->loadDefaultView('public/confirmation_page.html', 'HR laws');
    }
}
