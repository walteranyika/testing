<?php
  include 'protect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Welcome to Union MIS</title>
      <script src="js/jquery.min.js"></script>
      <!--<script src="jquery-1.11.0.js"></script>-->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
      <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
      <link rel="stylesheet" type="text/css" href="css/home.css" />
      <!-- Start WOWSlider.com HEAD section -->
      <link rel="stylesheet" type="text/css" href="engine1/style.css" />
      <script type="text/javascript" src="engine1/jquery.js"></script>
      <!-- End WOWSlider.com HEAD section -->
</head>

<body style="background-color:#00838f">
    
    <div class="logout_btn">
        <a href="logout.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>    
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="everyone.php"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php  include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">		
        <div class="panel panel-default">
            <!-- Default panel contents -->
           <div class="panel-heading">User Login History</div>
            <!-- Table -->
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">User</th>
                            <th style="text-align: center;">IP Address</th>
                            <th style="text-align: center;">Time</th>
                            <th style="text-align: center;">Date</th>
                        </tr>                        
                    </thead>
                      <?php
                         include 'connect.php';
                         $sql="SELECT `login_history`.`user_id`, `login_history`.`date`, `login_history`.`ip_address`,
                          `login_history`.`time`,`users`.`names` FROM `login_history` INNER JOIN `users` ON `login_history`.`user_id`=`users`.`user_id`";
                         $results=mysql_query($sql);
                         $num=1;
                         while ($row=mysql_fetch_row($results)) 
                         {
                            $id=$row[0]; $date=$row[1]; $ip=$row[2]; $time=$row[3];  $user=$row[4];
                                 echo "<tr id='$id'>
                                        <td>$num</td>
                                        <td>$user</td>
                                        <td>$ip</td>
                                        <td>$time</td>
                                        <td>$date</td>
                                       </tr>";
                             $num++;
                         }
                      ?>
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>