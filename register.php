<?php
include "Functions.php";
include "User.php";

$user = new User($_POST["fname"], $_POST["lname"], $_POST["phone"], $_POST["email"], $_POST["password"]);

$fun = new Functions();

if($fun->checkClientExists($user->getPhone())) {
    echo "Client ".$user->getFname()." is already registered!";
} else {
    $fun->registerClient($user->getInsertQuery());
    echo "Your registration was successful. Go ahead and log in";
    header("refresh:5; url=index.php#hf-email");
}
?>