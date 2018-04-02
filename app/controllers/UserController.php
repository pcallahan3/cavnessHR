<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 5/15/2017
 * Time: 7:34 PM
 */
class UserController extends Controller {

    function __construct(){
        $this->_f3 = Base::instance();
    }

    function login(){

        $user = new User();

        $email = $this->_f3->get('POST.email');
        $password = $this->_f3->get('POST.password');

        $user = $user->getByField('email', $email);

        if (Bcrypt::instance()->verify($password,$user->password)){
            $this->_f3->set('SESSION.admin', $user->role);
            $this->_f3->set('SESSION.test', "TEST SESSION CHECK: " . $user->role . "::". $this->_f3->get('SESSION.logged_in'));

            $this->_f3->reroute('/all_users');

        }
        $this->loadDefaultView('users/login.html', 'Login');
    }

    function sign_up(){

        $newUser = new User();

        //add the fields to the user object to be saved
        $newUser->email = $this->_f3->get('POST.email');
        $newUser->password = Bcrypt::instance()->hash($this->_f3->get('POST.password'));

        echo $this->_f3->get('POST.email');
        //validate and save
        if (strlen($newUser->email) > 1){
            $newUser->save();
            $this->_f3->reroute('/');
        }

        //load html files
        $this->loadDefaultView('users/new_user.html', 'New User');
    }

    function logout(){
        $this->_f3->set('SESSION.admin', null);
        $this->_f3->reroute('/');
    }

    function show_all_users(){
        if (!$this->_f3->get('SESSION.admin')){
            $this->_f3->reroute('/');
        }


        $allUsers = new HandbookModel();
        $this->_f3->set('clients',$allUsers->activeUsers());
        $this->loadDefaultView('users/admin.html', 'Admin Page');
    }

    function one_user(){

        if (!$this->_f3->get('SESSION.admin')){
            $this->_f3->reroute('/');
        }
        $handbook = new HandbookModel();
        $handbook->getById($this->_f3->get('PARAMS.id'));

        $this->_f3->set('handbook', $handbook);
        $this->loadDefaultView('users/single_client.html', $handbook->company_name);
    }

}
