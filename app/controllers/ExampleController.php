<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 4/15/2017
 * Time: 3:32 PM
 */
class ExampleController
{

    function __construct(){
        $this->_f3 = Base::instance();
    }
    function exampleMethod(){

        //instantiate the model objects you need
        $example = new ExampleModel();
        $customer = new CustomerModel();

        $this->_f3->set('stringFromTheModel', $example->exampleModelMethod());
        $this->_f3->set('customersFromTheModel', $customer->all());

        //load html files
        $this->_f3->set('content', './example_views/view_example.html');
        $template=new Template;
        echo $template->render('main.html');
    }

}