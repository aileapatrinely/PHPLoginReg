<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ya did it. Congrats on that.</h1>
    <!-- gonna need email and user id displayed and a logout form -->
    <p>Your Email:<?= $_SESSION['email']?></p>
    <p>Your User id:<?=$_SESSION['user_id']?></p>
</body>
</html>
