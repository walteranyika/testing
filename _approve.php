<?php
   include 'connect.php';
   session_start();
   $user_idd= $_SESSION['user_id'];
   extract($_POST);
   $tid=uniqid();   
   $sql="UPDATE `members` SET `date_approved`=CURDATE(),`application_status`='Approved',`transaction_id`='$tid'
         WHERE `meber_id`='$member_id'";   
   $res=mysql_query($sql);
   if($res)
   {
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                   VALUES (null,'$tid','$user_idd',CURDATE(),'Approved This User')";
      mysql_query($sql2);
      echo "Success";
   }
   else
   {
      echo "Failed To Approve User";
   }



?>