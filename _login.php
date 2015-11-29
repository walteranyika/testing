<?php
    extract($_POST);
    include 'connect.php';
    $password = md5($password."!@#$%^&*()_+_)qwertyupokjhbvcvbn(*&^%$#@");
    $sql="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
   // echo $sql;
    $result =mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($result)>0)
    {
       $row=mysql_fetch_row($result);
       $user_id=$row[0];
       $names=$row[1];
       $email=$row[2];
       $type =$row[4];
       session_start();
       $_SESSION['user_id'] = $user_id;
       $_SESSION['names'] = $names;
       $_SESSION['email'] = $email;
       $_SESSION['type'] = $type;
       //echo "$type";
       $ip=get_ip_address();
       $time=date("h:i");
       $sql_history="INSERT INTO `login_history`(`login_id`, `user_id`, `date`, `ip_address`, `time`) 
                                 VALUES (null,'$user_id',CURDATE(),'$ip','$time')";
       mysql_query($sql_history);
       header("location:home.php");
    }
    else
    {
       echo "Failed";  
    }

  function get_ip_address()
   {  
      $ip="";
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
      {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
      {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else 
      {
        $ip = $_SERVER['REMOTE_ADDR'];
      } 
       return $ip;    
   }
?>