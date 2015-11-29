<?php

   include 'connect.php';
   //TODO: redirect, user ID
   extract($_POST);
   $tid=uniqid();
   session_start();
   $user_idd= $_SESSION['user_id'];
   $sql="INSERT INTO `members`(`meber_id`, `names`, `gender`, `phone`, `national_id`, `designation`, `location`, `employee_no`, `company_id`, `date_applied`, `date_approved`, `application_status`, `transaction_id`) VALUES
                              (null,'$names','$gender','$phone','$idnumber','$designation','$location','$enumber','$company','$date',CURDATE(),'Pending','$tid')";
   $res = mysql_query($sql);
   if($res)
   {
      $sql_id="select `meber_id` FROM  `members` WHERE  `transaction_id`='$tid'";
      $row=mysql_fetch_row(mysql_query($sql_id));
      $id=$row[0];
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES 
                                       (null,'$id','$user_idd',CURDATE(),'New Applicant Added')";
      mysql_query($sql2);
      echo "success";

   }else
   {
      echo "Failed";
   }
?>