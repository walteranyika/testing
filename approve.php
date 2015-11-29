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
      <script src="dist/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

      <script type="text/javascript">
            $(function() 
            {
              $('.btn_del').on('click', function()
              {
                    var button = $(this);
                    var parentTd = button.parent('td');
                    var parentTr = parentTd.parent('tr');
                    var id = parentTr.attr('id');                  
                    send_approval(id) ;

              }); 
            });
            function send_approval(idval)
            {
                $.post("_approve.php",
                        {member_id: idval },
                        function(data,status)
                        {
                          console.log(data);
                          swal("Approval Complete!", data, "success");
                          $("#"+idval).remove();
                        }
                     );
         
            }
      </script>
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
           <div class="panel-heading">Pending Approvals</div>
            <!-- Table -->
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Names</th>
                            <th style="text-align: center;">Gender</th>
                            <th style="text-align: center;">Phone</th>
                            <th style="text-align: center;">National ID</th>
                            <th style="text-align: center;">Designation</th>
                            <th style="text-align: center;">Location</th>
                            <th style="text-align: center;">Employee #</th>
                            <th style="text-align: center;">Company</th>
                            <th style="text-align: center;">Date Applied</th>
                            <th style="text-align: center;">Approve</th>
                          </tr>                        
                    </thead>
                    <tbody>
                      <?php
                         include 'connect.php';
                         $sql="SELECT `members`.`meber_id`, `members`.`names`, `members`.`gender`, `members`.`phone`, `members`.`national_id`, `members`.`designation`, `members`.`location`, `members`.`employee_no`,  `members`.`date_applied`,`companies`.`name`
                               FROM `members` INNER JOIN `companies`ON `members`.`company_id`=`companies`.`company_id` WHERE `members`.`application_status`='Pending'";
                         $results=mysql_query($sql);
                         $num=1;
                         while ($row=mysql_fetch_row($results)) 
                         {
                              $id=$row[0]; $names=$row[1]; $gender=$row[2]; 
                              $phone=$row[3];  $national_id=$row[4];  $designation=$row[5]; 
                              $location=$row[6];  $employee_no=$row[7]; 
                              $date_applied=$row[8];  $company_name=$row[9];   

                              echo "<tr id='$id'>
                                          <td>$num</td>
                                          <td>$names</td>
                                          <td>$gender</td>
                                          <td>$phone</td>
                                          <td>$national_id</td>
                                          <td>$designation</td>
                                          <td>$location</td>
                                          <td>$employee_no</td>
                                          <td>$company_name</td>
                                          <td>$date_applied</td>                                                                           
                                          <td><button class='btn_del'>Approve</button></td>
                                    </tr>";
                               $num++;
                         }
                      ?>
                    </tbody>
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>