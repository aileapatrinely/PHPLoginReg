<?php
session_start();
//require new_connection.php 
require_once('new_connection.php');
//check for session registration errors
//check for session login errors


//registration form
// if statement check for empty post
if(!empty($_POST)){
    // set errors
    $_SESSION['errors'][]="First Name is required.";
}
//else if ctype alpha for first name
else if(!ctype_alpha($_POST['first_name'])){
    // set errors
    $_SESSION['errors'][]="First Name cannot have any numbers.";
}
//if not last name
if(!$_POST['last_name']){
    //set error
    $_SESSION['errors'][]="Last Name is required.";
}
//else if ctype alpha last name
else if(!ctype_alpha($_POST['last_name'])){
    //errors
    $_SESSION['errors'][]="Last Name cannot have any numbers.";
}
//if email
if(!$_POST['email']){
    //errors
    $_SESSION['errors'][]="Email is required.";
}
//else if filter var?
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //errors
    $_SESSION['errors'][]="Email is not valid.";
}
//if no password
if(!$_POST['password']){
    //set error
    $_SESSION['errors'][]="Password is required.";
}
//else if strlen
else if($_POST['password']<=6){
    //errors
    $_SESSION['errors'][]="Password must be greater than 6 characters.";
}
//if c_password
if(!$_POST['c_password']){
    //errors
    $_SESSION['errors'][]="Password Confirmation is required.";
}
//else if c_password != password
else if($_POST['c_password']!=$_POST['password']){
    //errors
    $_SESSION['errors'][]="Passwords must match.";
}


//login form
?>