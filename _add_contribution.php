<?php
     include 'connect.php';
     extract($_POST);
     $tid=uniqid();
     session_start();
     $user_idd= $_SESSION['user_id'];
     $sql="INSERT INTO `contributions`(`contribution_id`, `member_id`, `date_contributed`, `contribution_amt`, `transaction_id`) 
                                VALUES (null,'$mid','$tarehe','$amt','$tid')";

     /* $file = fopen("data.txt", "w+");
      fputs($file,$tarehe);
      fclose($file);*/
      //2015-11-29
      $splitted=explode("-", $tarehe);
      $data = $splitted[0]."-".$splitted[1];
      
     /* $file = fopen("data.txt", "w+");
      fputs($file,$data);
      fclose($file);*/
      //2015-11-29
      $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
      $month =$months[$splitted[1]-1];
      $year=$splitted[0];
      $sql_c = "select * from `contributions` WHERE `member_id`='$mid' AND date_contributed LIKE '$data%'";

      $file = fopen("data.txt", "w+");
      fputs($file,$sql_c);
      fclose($file);

      $result=mysql_query($sql_c);
      if(mysql_num_rows($result)==0)
      {
             $res=mysql_query($sql);
             if($res)
             {
                    $sql_id="select `contribution_id` FROM  `contributions` WHERE  `transaction_id`='$tid'";
                    $row=mysql_fetch_row(mysql_query($sql_id));
                    $id=$row[0];
              $sql2="INSERT INTO `transcations`(`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) 
                                                VALUES  (null,'$id','$user_idd',CURDATE(),'Added New Contribution')";
              mysql_query($sql2);
              $sql3="UPDATE `members` SET `application_status`='Approved' WHERE `meber_id`='$mid'";
              mysql_query($sql3);
              echo "Successfully Added Contribution for The month of $month Year $year for member $names";
             }else
             {
              echo "Failed";
             }

      }else
      {
         echo "Failed. You cannot add contribution for the same member twice in the same month. You already have the contribution for the month of $month Year $year";
      }

?>