<?php

	include 'connect.php';
	extract($_POST);
	session_start();
    $user_idd= $_SESSION['user_id'];
	$tid=uniqid();   
	$password = md5("password"."!@#$%^&*()_+_)qwertyupokjhbvcvbn(*&^%$#@");
	$sql="UPDATE `users` SET `password`='$password',`tid`='$tid' WHERE `user_id`='$user_id'";
	
	$res=mysql_query($sql);
	if($res)
	{
	  $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
	                                   VALUES (null,'$user_id','$user_idd',CURDATE(),'Reset Password For This User')";
	  mysql_query($sql2);
	  echo "Success";
	}
	else
	{
	  echo "Failed To Reset Password";
	}
?>