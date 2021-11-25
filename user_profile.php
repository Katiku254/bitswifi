<?php

include "ProfilePage.php";
include "Functions.php";
include "User.php";

$fun = new Functions();

if(!isset($_POST["phone"]) || !isset($_POST["password"])) {
    header("Location:index.php#hf-email");
}

$row = $fun->loginClient($_POST);

if(count($row) < 1) {
    echo "Invalid Credentials! Try again!";
    header("refresh:5; url=index.php#hf-email");
} 

session_start();

if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = $row;
}

$profile = new ProfilePage("Dashboard", $row);
$profile->printPage();

?>