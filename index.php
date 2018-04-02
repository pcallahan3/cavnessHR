<?php

require 'vendor/autoload.php';

//create an instance of the framework base object
$f3=\Base::instance();

//config files that store variables to be used by the framework
$f3->config('config.ini');
$f3->config('routes.ini');

$f3->set('dataBase',new DB\SQL(
    $f3->get('dbname'),
    $f3->get('dbuser'),
    $f3->get('dbpassword'),
    array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
));

new Session();
$f3->run();

?>
