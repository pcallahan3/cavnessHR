<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 5/16/2017
 * Time: 8:22 AM
 */
class AdminModel extends Model
{
    function __construct(){
        parent::__construct('users');
    }
}