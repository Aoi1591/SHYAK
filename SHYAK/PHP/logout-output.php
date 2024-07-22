<?php session_start();?>
<?php require 'connect.php';?>
<?php
   $_SESSION = array();
   session_destroy();
   header("Location:login-input.php?logout=1");
   exit;
   ?>