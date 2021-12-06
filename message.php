<?php
include "Functions.php";

session_start();

if(!isset($_POST["message"])) {
    header("Location:contact.php");
} else {
    $fun = new Functions();
    
    if(isset($_SESSION["user"]) && $_POST["user"] == "1") {
        $_POST["user"] = $_SESSION["user"]["ID"];
    }
    $fun->insertMessage($_POST);
    header("Location:contact.php");
}
?>