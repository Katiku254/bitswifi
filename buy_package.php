<?php
include "BuyPackagePage.php";

session_start();

if(!isset($_SESSION["user"])) {
    header("Location:index.php#hf-email");
}

$buy = new BuyPackagePage("Buy Package", $_SESSION["user"]);
$buy->printPage();

?>