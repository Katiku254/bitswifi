<?php
include "EditAccountPage.php";
include "Functions.php";

session_start();

if(!isset($_SESSION["user"])) {
    header("Location:index.php#hf-email");
}

if(isset($_GET["edit"]) && $_GET["edit"] == 1) {
    if(!($_POST["fname"] == $_SESSION["user"]["fname"] &&
        $_POST["lname"] == $_SESSION["user"]["lname"] &&
        $_POST["email"] == $_SESSION["user"]["email"] &&
        $_POST["password"] == $_SESSION["user"]["password"])) {
            $fun = new Functions();
            $fun->editAccount($_POST, $_SESSION["user"]["phone"]);
            $_SESSION["user"]["fname"] = $_POST["fname"];
            $_SESSION["user"]["lname"] = $_POST["lname"];
            $_SESSION["user"]["email"] = $_POST["email"];
            $_SESSION["user"]["password"] = $_POST["password"];
        }
    header("Location:edit_account.php");
} else {
    $editor = new EditAccountPage("Edit Account", $_SESSION["user"]);
    $editor->printPage();
}

?>