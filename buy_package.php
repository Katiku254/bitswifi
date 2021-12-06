<?php
include "BuyPackagePage.php";
include "Functions.php";

session_start();

if(!isset($_SESSION["user"])) {
    header("Location:index.php#hf-email");
}

$buy = new BuyPackagePage("Buy Package", $_SESSION["user"]);
$fun = new Functions();

if(isset($_GET["bundle"])) {
    $row = $fun->getPackage($_GET["bundle"]);
    $buy->setPageData(1, $row);
}
$buy->printPage();
?>