<?php
   include 'connect.php';
   session_start();
   $user_id= $_SESSION['user_id'];
   extract($_POST);
   $tid=uniqid();
   $password=md5("password"."!@#$%^&*()_+_)qwertyupokjhbvcvbn(*&^%$#@");
   $sql="INSERT INTO `users`(`user_id`, `names`, `email`, `password`, `type`, `reg_date`,`tid`) 
         VALUES (null,'$names','$email','$password','$user_type',CURDATE(),'$tid')";
   $res=mysql_query($sql);
   if($res)
   {
        $sql_id="select `user_id` FROM  `users` WHERE  `tid`='$tid'";
        $row=mysql_fetch_row(mysql_query($sql_id));
        $id=$row[0];
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                                   VALUES 
                                      (null,'$id','$user_id',CURDATE(),'Added New User')";
      mysql_query($sql2);
      echo "Success";
   }
   else
   {
      echo "Failed To Add User $names. The user might be already in your database";
   }


?>