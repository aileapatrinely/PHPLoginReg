<?php
session_start();
//require new_connection.php 
require_once('new_connection.php');
$_SESSION['reg_errors']=[];
$_SESSION['login_errors']=[];

//ADD YOUR OUTER IF STATEMENT CHECKING FOR POST ACTION AND MAKING SURE IT  = REGISTER
//registration form
// if statement check isset and not empty
if(isset($_POST['action'])&& $_POST['action']=='register')
    if(!empty($_POST['first_name'])){
        // set errors
        $_SESSION['reg_errors'][]="First Name is required.";
    }
    //else if ctype alpha for first name
    else if(!ctype_alpha($_POST['first_name'])){
        // set errors
        $_SESSION['reg_errors'][]="First Name cannot have any numbers.";
    }
    //else if strlen
    else if(strlen($_POST['first_name'])<2){
        $_SESSION['reg_errors'][]="First Name has to be longer than 2 characters, if not, go get that legally changed, then try again.";
    }
    //if not last name
    if(!$_POST['last_name']){
        //set error
        $_SESSION['reg_errors'][]="Last Name is required.";
    }
    //else if ctype alpha last name
    else if(!ctype_alpha($_POST['last_name'])){
        //errors
        $_SESSION['reg_errors'][]="Last Name cannot have any numbers.";
    }
    //else if strlen
    else if(strlen($_POST['last_name'])<2){
        $_SESSION['reg_errors'][]="Last Name has to be longer than 2 characters, if not, go get that legally changed, then try again.";
    }
    //if email
    if(!$_POST['email']){
        //errors
        $_SESSION['reg_errors'][]="Email is required.";
    }
    //else if filter var?
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        //errors
        $_SESSION['reg_errors'][]="Email is not valid.";
    }
    //if no password
    if(!$_POST['password']){
        //set error
        $_SESSION['reg_errors'][]="Password is required.";
    }
    //else if strlen
    else if($_POST['password']<=6){
        //errors
        $_SESSION['reg_errors'][]="Password must be greater than 6 characters.";
    }
    //if c_password
    if(!$_POST['c_password']){
        //errors
        $_SESSION['reg_errors'][]="Password Confirmation is required.";
    }
    //else if c_password != password
    else if($_POST['c_password']!=$_POST['password']){
        //errors
        $_SESSION['reg_errors'][]="Passwords must match.";
    }
//this is where I'll check the session errors
if(count($_SESSION['regerrors'])>0){
    //got some errors send 'em back
    header('location: index.php');
    //kill it
    die();
}
//else no errors check if email is taken
else{
    //escape malicious strings
    $first_name=escape_this_string($_POST['first_name']);
    $last_name=escape_this_string($_POST['last_name']);
    $email=escape_this_string($_POST['email']);
    $password=escape_this_string($_POST['password']);
    //create a salt
    $salt=bin2hex(openss1_random_psuedo_bytes(22));
    //encrypt password with md5 & the salt
    $enc_password=md5($password .''. $salt);

    //finally query time!
}

//login form
?>