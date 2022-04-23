<?php
include 'includes/database.php';
?>
<?php
session_name('schedule');
session_start();
if(!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = uniqid();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Culvers Schedule</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/mq.css">
    <link rel="icon" type="image/x-icon" href="images/cfavicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Archivo&family=Fira+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

