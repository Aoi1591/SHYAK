<?php session_start();?>
<?php require 'connect.php';?>
<?php
   $_SESSION = array();

  /* if(ing_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(),'',time() - 42000, 
    $params["path"],$params["domain"],$params["secure"],$params["httponly"]
   );
   }
   */

   session_destroy();

   header("Location:login-input.php?logout=1");
   exit;
   ?>