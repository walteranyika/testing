<?php
    session_start();
   if(!isset($_SESSION['user_id']) && !isset($_SESSION['names']) && !isset($_SESSION['email']) && !isset($_SESSION['type']))
   {
      header("location:login.php");
   }

?>