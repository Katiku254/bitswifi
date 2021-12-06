<?php

include "ProfilePage.php";
include "Functions.php";
include "User.php";

session_start();

$fun = new Functions();

if(!isset($_SESSION["user"])) {
    if(isset($_POST["phone"]) && isset($_POST["password"])) {
        $row = $fun->loginClient($_POST);
        if(count($row) < 1) {
            echo "Invalid Credentials! Try again!";
            header("refresh:5; url=index.php#hf-email");
        } else {
            $_SESSION["user"] = $row;
        }
    } else {
        header("Location:index.php#hf-email");
    }
}

$invoices = $fun->getInvoices($_SESSION["user"]["ID"]);
$profile = new ProfilePage("Home", $_SESSION["user"], $invoices);
$profile->printPage();

?>