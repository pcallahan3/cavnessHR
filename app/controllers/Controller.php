<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 4/15/2017
 * Time: 3:52 PM
 */
abstract class Controller
{
    function __construct(){
        $this->_f3 = Base::instance();
    }

    function beforeroute(){

    }

    function loadDefaultView($file, $title)
    {
        //load html files
        $this->_f3->set('title', $title);
        $this->_f3->set('content', $file);


        $template=new Template;
        echo $template->render('main.html');
    }
}