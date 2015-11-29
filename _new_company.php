<?php
  include 'connect.php';
  extract($_POST);
  $tid=uniqid();
  session_start();
  $user_idd= $_SESSION['user_id'];
  $sql="INSERT INTO `companies`(`company_id`, `category`, `name`, `address`, `date_added`,`tid`) 
                         VALUES (null,'$category','$name','$address',CURDATE(),'$tid')";
  $res=mysql_query($sql);
  if($res)
  {
      $sql_id="select `company_id` FROM  `companies` WHERE  `transaction_id`='$tid'";
      $row=mysql_fetch_row(mysql_query($sql_id));
      $id=$row[0];
  	  $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES
  	                                  (null,'$id','$user_idd',CURDATE(),'New Company Added')";
      mysql_query($sql2);
    echo "success";
  }
  else
  {
    echo "Failed";
  }

?>