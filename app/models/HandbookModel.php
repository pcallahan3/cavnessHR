<?php

/**
 * Created by PhpStorm.
 * User: cintu
 * Date: 4/17/2017
 * Time: 1:09 PM
 */
class HandbookModel extends Model{

    public function __construct() {
        parent::__construct('emp_handbook');
    }

    public function activeUsers() {
        $this->load(array('isActive=?',1));
        return $this->query;
    }
}