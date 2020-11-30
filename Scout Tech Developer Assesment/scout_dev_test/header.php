<?php
require_once 'user_model.php';
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/style.css" >

    <script defer src="jquery/jquery-3.5.1.min.js" ></script>
    <script defer src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php print (isset($additionalScripts)) ? $additionalScripts : ''; ?>
    <title>Developer Assesment - Garryd Smit</title>
    
  </head>
  <body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="index.php">Scout Technologies Users</a>
  </nav>
  <div class="container-fluid">
