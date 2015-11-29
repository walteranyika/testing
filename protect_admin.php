<?php  
   if ($_SESSION['type']!="Administrator") 
   {
   	  header("location:home.php");
   }
?>