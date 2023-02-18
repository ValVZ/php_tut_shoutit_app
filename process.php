<?php
include 'database.php';

//Check if form was submitted
If(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($con, $_POST['user']) ;
    $message = mysqli_real_escape_string($con, $_POST['message']) ;
    //Set timezone
    date_default_timezone_set('America/New_York');
    $time= date('h:i:s a', time());

    //Validate input
    if(!isset($user) || $user==''|| !isset($message) || $message== '' ) {
        $error = "Pelease fill in your name and message";
        header("location: index.php?error=".urlencode($error));
        exit();
    } else {
        $query = "INSERT INTO shouts (user, message, time)
            VALUES('$user', '$message', '$time')";

        if (!mysqli_query($con, $query)) {
            die('Error: '.mysqli_error($con));
        } else {
            header("location: index.php");
            exit();
        }
    }
}