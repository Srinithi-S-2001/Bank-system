<?php 
    session_start();
    define('SITEURL','http://localhost/bank-system/');
    $conn=mysqli_connect('localhost','root','') or die(mysqli_error());
    $sql_select=mysqli_select_db($conn,'bank-system')or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap" rel="stylesheet">
    <title>user</title>
</head>
<body>
    <div id="navbar">
        <img src="images/logo.png" alt="logo" style="width:250px;height:67px;float:left;"></img>
        <ul class="heading">
            <li><a href="<?php echo SITEURL; ?>#home">Home</a></li>
            <li><a href="<?php echo SITEURL; ?>#services">Services</a></li>
            <li><a href="<?php echo SITEURL; ?>#about">About Us</a></li>
            <li><a href="<?php echo SITEURL; ?>customers.php">Customers</a></li>
        </ul>
    </div>