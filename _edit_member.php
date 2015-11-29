<?php

   include 'connect.php';
   //TODO: redirect, user ID
   session_start();
   $user_idd= $_SESSION['user_id'];
   extract($_POST);
   $tid=uniqid();
   /*$sql="INSERT INTO `members`(`meber_id`, `names`, `gender`, `phone`, `national_id`, `designation`, `location`, `employee_no`, `company_id`, `date_applied`, `date_approved`, `application_status`, `transaction_id`) VALUES
                              (null,'$names','$gender','$phone','$idnumber','$designation','$location','$enumber','$company','$date',CURDATE(),'Approved','$tid')";*/
   $sql="UPDATE `members` SET `names`='$names',`gender`='$gender',`phone`='$phone',`national_id`='$idnumber',`designation`='$designation',`location`='$location',`employee_no`='$enumber',`company_id`='$company',`date_applied`='$date',`application_status`='Approved',`transaction_id`='$tid' WHERE `meber_id`='$member_id'"; 
   $res = mysql_query($sql);
   if($res)
   {
      $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES 
                                        (null,'$member_id','$user_idd',CURDATE(),'Edited This Member')";
      mysql_query($sql2);
      echo "success";

   }else
   {
      echo "Failed";
   }
?>