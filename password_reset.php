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
      <script src="dist/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="dist/sweetalert.css">
      <script type="text/javascript">
        function submit_data()
        {
             event.preventDefault();
             var old_d = $("#old_pass").val();
             var new_d = $("#new_pass").val();
             var confirm_d =$("#confirm_pass").val();

             console.log(old_d +" "+new_d +" "+confirm_d);  
             if(new_d==confirm_d && new_d.length > 5)   
             {      
               $.post('_password_reset.php',
                       {old_pass:old_d,  new_pass:new_d},
                       function(data,status)
                       {
                           console.log(data);
                          if(data.indexOf("success")!= -1)
                          {
                              
                              swal("Success", data, "success");
                              //$("#form_data").hide();
                              $("#old_pass").val("");
                              $("#new_pass").val("");
                              $("#confirm_pass").val("");                       
                          }
                          else
                          {
                             sweetAlert("Error", data, "error");
                          }
                       }
                );
           }
           else
           {
               sweetAlert("Mismatch", "Your Passwords Dont Match OR  length of your password is  less than 6", "error");  
           }
          }
      </script>
</head>

<body style="background-color:#00838f">
    
    <div class="logout_btn">
        <a href="logout.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>    
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="home.php"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span></a>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php  include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">		
        <div class="row">
            <div class="col-lg-4 col-md-4"></div>
            <div class="col-lg-4 col-md-4">
                  	<div class="panel panel-default">
                      <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Password Reset</h1></div>
                        <div class="panel-body">

                            <form role="form" onsubmit="submit_data()">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="form-control" id="old_pass" type="password" placeholder="Old Password" required>
                                </div> 
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control"  id="new_pass"  type="password" placeholder="New Passowd" required>
                                </div>                             
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input class="form-control"  id="confirm_pass" type="password" placeholder="Confirm New Password" required>
                                </div> 
                                 <button class="btn btn-default">Reset password</button>
                            </form>                   

                        </div>
                     </div><!--End Of Panel-->
                 </div>
            <div class="col-lg-4 col-md-4"></div>
       </div>
  </div> <!--End of Middle Container-->
</body>
</html>