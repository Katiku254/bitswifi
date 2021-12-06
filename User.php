<?php

class User {
    var $fname;
    var $lname;
    var $phone;
    var $email;
    var $pword;
    
    function __construct ($fname, $lname, $phone, $email, $pword) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone = $phone;
        $this->email = $email;
        $this->pword = $pword;
    }
    
    function getLname() {
        return $this->lname;
    }

    function getFname() {
        return $this->fname;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getPword() {
        return $this->pword;
    }

    function getInsertQuery($ext) {
        return 'insert into user (ID, fname, lname, phone, email, password, imageName) VALUES(
            "", "'.$this->fname.'", "'.$this->lname.'", "'.$this->phone.'", "'.$this->email.'", "'
            .$this->pword.'", "'.$ext.'")';
    }

}