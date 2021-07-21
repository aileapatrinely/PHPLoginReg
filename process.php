<?php
session_start();
//require new_connection.php 
//check for session registration errors
//check for session login errors


//registration form
// if statement check for empty post
if(!empty($_POST)){
    // set errors
    $reg_errors[]="First Name is required.";
}
//else if ctype alpha for first name
else if(!ctype_alpha($_POST['first_name'])){
    // set errors
    $reg_errors[]="First Name cannot have any numbers.";
}
//if not last name
if(!$_POST['last_name']){
    //set error
    $reg_errors[]="Last Name is required.";
}
//else if ctype alpha last name
else if(!ctype_alpha($_POST['last_name'])){
    //errors
    $reg_errors[]="Last Name cannot have any numbers.";
}
//if email
if(!$_POST['email']){
    //errors
    $reg_errors[]="Email is required.";
}
//else if filter var?
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //errors
    $reg_errors[]="Email is not valid.";
}
//if no password
if(!$_POST['password']){
    //set error
    $reg_errors[]="Password is required.";
}
//else if strlen
else if($_POST['password']<=6){
    //errors
    $reg_errors[]="Password must be greater than 6 characters.";
}
//if c_password
if(!$_POST['c_password']){
    //errors
    $reg_errors[]="Password Confirmation is required.";
}
//else if c_password != password
else if($_POST['c_password']!=$_POST['password']){
    //errors
    $reg_errors[]="Passwords must match.";
}

//queries happening here for some reason

//login form
?>