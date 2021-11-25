<?php

class User {
    var $fname;
    var $lname;
    var $phone;
    var $email;
    var $pword;
    var $packageID = 0;
    var $paymentID = 0;

    function __construct ($fname, $lname, $phone, $email, $pword) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone = $phone;
        $this->email = $email;
        $this->pword = $pword;
    }
    
    function setPackageID($packageID) {
        $this->packageID = $packageID;
    }

    function setPaymentID($paymentID) {
        $this->paymentID = $paymentID;
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

    function getPackageID() {
        return $this->packageID;
    }

    function getPaymentID() {
        return $this->paymentID;
    }

    function getInsertQuery() {
        return 'insert into user (ID, fname, lname, phone, email, password) VALUES(
            "", "'.$this->fname.'", "'.$this->lname.'", "'.$this->phone.'", "'.$this->email.'", "'
            .$this->pword.'")';
    }

}