<?php
include "Functions.php";
include "InvoicePage.php";

session_start();

if(!isset($_SESSION["user"])) {
    header("Location:index.php#hf-email");
}

$fun = new Functions();

if(isset($_POST["packageID"])) {    
    $row = $fun->checkPaymentExists($_POST["code"]);
    if(count($row) > 0) {
        echo "The MPESA transaction code: ".$_POST["code"].
                " has already been used by phone number: ".$row["phone"].
                " on date: ".$row["date"]."!";
        header("refresh:5, url=buy_package.php");
    }
    $date_array = getdate();
    $date = $date_array["mday"]."-".$date_array["mon"]."-".$date_array["year"].", ".
            $date_array["hours"].":".$date_array["minutes"].":".$date_array["seconds"];

    $paymentData = array($_SESSION["user"]["ID"], $date, 
                        $_POST["packageID"], $_POST["code"], $_POST["phone"]);
    $fun->insertPayment($paymentData);
} 

$invoices = $fun->getInvoices($_SESSION["user"]["ID"]);
$invoicePage = new InvoicePage("Invoices", $_SESSION["user"], $invoices);
$invoicePage->printPage();

?>