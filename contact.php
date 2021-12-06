<?php
include "ContactPage.php";

session_start();

$contact = new ContactPage("Contact Us");

if(isset($_SESSION["user"])) {
    $contact->setLogged(1);
    $contact->setUserData($_SESSION["user"]);
}

$contact->printPage();
?>