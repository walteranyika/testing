<?php
   include 'connect.php';
   session_start();
   $user_idd= $_SESSION['user_id'];
   extract($_POST);
   $tid=uniqid();   
   $sql="UPDATE `users` SET `names`='$names',`email`='$email',`type`='$user_type',`tid`='$tid' WHERE `user_id`='$user_id'";
   
   $res=mysql_query($sql);
   if($res)
   {
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                   VALUES (null,'$user_id','$user_idd',CURDATE(),'Edited This User')";
      mysql_query($sql2);
      echo "Success";
   }
   else
   {
      echo "Failed To Edit User $names";
   }
?>