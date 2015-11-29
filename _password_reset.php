<?php
   include 'connect.php';
   extract($_POST);
   //{c_id:contribution_id,tarehe:date,amt:amount}
   session_start();
   $user_idd= $_SESSION['user_id'];
   $tid=uniqid();
   $password = md5($old_pass."!@#$%^&*()_+_)qwertyupokjhbvcvbn(*&^%$#@");
   $res=mysql_query("select * from users where user_id='$user_idd' AND password='$password'");
   if(mysql_num_rows($res)>0)
   {
      $password_new = md5($new_pass."!@#$%^&*()_+_)qwertyupokjhbvcvbn(*&^%$#@");
      $sql="UPDATE `users` SET `password`='$password_new' WHERE `user_id`='$user_idd'";  
      $result=mysql_query($sql);
      if($result) 
      {
         echo "Password has been reset successfully";
          $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                   VALUES (null,'$user_idd','$user_idd',CURDATE(),'Changed  Password')";
        mysql_query($sql2);
      }else
      {
         echo "Failed To Reset The Password. Try Again Later";
      }


   }
   else
   {
     echo "Failed. Your old password is wrong";
   }  

?>