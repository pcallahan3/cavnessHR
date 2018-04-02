<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 4/17/2017
 * Time: 1:09 PM
 */

 /*  Pull form data from employee handbook form, post to emp_book_data database
  * @access public
  * @param string $company_name
  * @param string $company_contact
  * @param string $company_intro
  * @param string $company_email
  * @param string $work_hrs_days
  * @param string $payroll_start_stop
  * @param string $pay_freq        
  * @param string $paid_holidays
  * @param string $unllimitted_vaca
  * @param string $day_hour_vaca
  * @param string $vaca_sick_qty
  * @param string $combine_pto
  * @param string $vaca_approval
  * @param string $maternity_leave
  * @param string $paternity_leave
  * @param string $maternity_leave_pay
  * @param string $workers_comp
  * @param string $bereavement_time
  * @param string $other_comments
  * @return 
  *
  *
  */
 class HandbookController extends Controller {

    function __construct(){
        $this->_f3 = Base::instance();
    }
    
    function submitBook() {

        $handbook = new HandbookModel();

        //file upload manager and creates a changes the name to something unique id
        $overwrite = false;
        $logo = Web::instance()->receive(function ($file){
        },$overwrite,function ($fileBaseName){
            return uniqid().strstr($fileBaseName, '.');
        });

        //this catches the unique name and saves it the DB
        $logoKey = array_keys($logo);
        $logoPath = $this->_f3->get('UPLOADS').pathinfo($logoKey['0'], PATHINFO_BASENAME);

        $handbook->logo = $logoPath;

        $paid_holidays = $this->_f3->get('POST.paid_holidays');

        if (sizeof($paid_holidays) != 0) {
              $paid_holidays = implode (", ", $paid_holidays);
        }
      
        $handbook->company_name = $this->_f3->get('POST.company_name');
        $handbook->company_contact = $this->_f3->get('POST.company_contact');
        $handbook->company_email = $this->_f3->get('POST.company_email');
        $handbook->company_intro = $this->_f3->get('POST.company_intro');

        $handbook->work_hrs_days = $this->_f3->get('POST.work_hrs_days');
        $handbook->payroll_start_stop = $this->_f3->get('POST.payroll_start_stop');
        $handbook->pay_freq = $this->_f3->get('POST.pay_freq');
        $handbook->day_hour_vaca = $this->_f3->get('POST.day_hour_vaca');

        $handbook->paid_holidays = $paid_holidays;
        $handbook->unlimited_vaca = $this->_f3->get('POST.unlimited_vacation');
        $handbook->vaca_sick_qty = $this->_f3->get('POST.vaca_sick_qty');
        $handbook->combine_pto = $this->_f3->get('POST.combine_pto');

        $handbook->vaca_approval = $this->_f3->get('POST.vaca_approval');
        $handbook->maternity_leave = $this->_f3->get('POST.maternity_leave');
        $handbook->paternity_leave = $this->_f3->get('POST.paternity_leave');
        $handbook->maternity_leave_pay = $this->_f3->get('POST.maternity_leave_pay');

        $handbook->workers_comp = $this->_f3->get('POST.workers_comp');
        $handbook->bereavement_time = $this->_f3->get('POST.bereavement_time');
        $handbook->other_comments = $this->_f3->get('POST.other_comments');

        $handbook->save();

        $mailer = new Mailer($this->_f3->get("adminEmail"),$this->_f3->get('POST.company_contact').
                                                                                    "Employee handbook request");
        $mailer->send(Template::instance()->render('mail/hand_book_request.html'));

        $this->emp_book_confirm();
    }
    
    // Load confirmation page if all data is validated correctly
    function emp_book_confirm(){
        $this->_f3->set('confirm_message', 'Your employee handbook has been submitted.');
        $this->loadDefaultView('public/confirmation_page.html', 'Thank You');
    }

    function deleteUser(){
        if (!$this->_f3->get('SESSION.admin')){
            $this->_f3->reroute('/');
        }
        $handbook = new HandbookModel();
        $handbook->getById($this->_f3->get('PARAMS.id'));
        $handbook->isActive = 0;
        $handbook->update();
        $this->_f3->reroute('/all_users');
    }
 }