<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 5/22/2017
 * Time: 12:52 PM
 */
class User extends Model{
    /**
     * accesses the users table in the database
     */
    function __construct()
    {
        parent::__construct('users');
    }
}