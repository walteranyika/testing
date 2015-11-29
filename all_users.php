<?php
  include 'protect.php';
  include 'protect_admin.php';
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
                    show_alert(id) 

              }); 
            });

            function show_alert(id)
            {

              swal({
                      title: "Are you sure?",
                      text: "The password Of This user will be reset to the default password",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Yes, Reset",
                      cancelButtonText: "No, Cancel",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm)
                    {
                      if (isConfirm) 
                      {
                        swal("Resetting!", "Resetting Password.", "success");
                        delete_row(id);
                      } 
                      else 
                      {
                          swal("Cancelled", "You cancelled Password Reset:)", "error");
                      }
                    });
            }

            function delete_row(idval)
            {
                $.post("_reset_password.php",
                      {user_id: idval },
                      function(data,status)
                      {
                        console.log(data);
                        swal("Reset Complete!", data, "success");
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
           <div class="panel-heading">All Members</div>
            <!-- Table -->
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Names</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Type</th>
                            <th style="text-align: center;">Reg Date</th>
                            <th style="text-align: center;" colspan="2">Operation</th>
                        </tr>                        
                    </thead>
                      <?php
                         include 'connect.php';
                         $sql="select * from users";
                         $results=mysql_query($sql);
                         $num=1;
                         while ($row=mysql_fetch_row($results)) 
                         {
                            $id=$row[0]; $names=$row[1]; $email=$row[2]; 
                            $type=$row[4];  $reg_date=$row[5];   

                            echo "<tr id='$id'>
                                        <td>$num</td>
                                        <td>$names</td>
                                        <td>$email</td>
                                        <td>$type</td>
                                        <td>$reg_date</td>
                                        <td><a href='edit_user.php?user_id=$id'>Edit</a></td>
                                        <td><button class='btn_del'>Reset Password</button></td>
                                  </tr>";
                             $num++;
                         }
                      ?>
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>