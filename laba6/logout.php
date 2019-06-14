<?php
   session_start();
   session_destroy();
   unset($_SESSION['username']);
   unset($_SESSION['password']);
   $_SESSION['message']= "Вы разлогинились";
   header("location: login.php");
?>