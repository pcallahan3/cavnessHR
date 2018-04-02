<?php

/**
 *
 */
class Mailer extends SMTP{


    function __construct($to, $subject){
        $this->_f3 = Base::instance();
        $from = $this->_f3->get("sourceEmail");
        $errors = $this->_f3->get("errorsEmail");
        $mime = $this->_f3->get("mimeType");
        $contentType = $this->_f3->get("contentType");

        parent::__construct(
            $this->_f3->get('host'),
            $this->_f3->get('port'),
            $this->_f3->get('scheme'),
            $this->_f3->get('user'),
            $this->_f3->get('pw')
        );
        $this->set('To', '"Contact Name" <'.$to.'>');
        $this->set("Subject", $subject);
        $this->set("Errors-to", $errors);
        $this->set("From", $from);
        $this->set("MIME-Version", $mime);
        $this->set("Content-Type", $contentType);
    }
}