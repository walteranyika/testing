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
             
             var namesd=$("#names").val();
             var emaild =$("#email").val();
             var user_typed =$("#user_type").val(); 
             console.log(namesd +" "+emaild +" "+user_typed);            
             $.post('_add_user.php',
                     {names:namesd,  email:emaild,  user_type:user_typed},
                     function(data,status)
                     {
                         console.log(data);
                        if(data.indexOf("Success")!= -1)
                        {
                            
                            swal("Success", "Added The User To The System", "success")
                            //$("#form_data").hide();
                            $("#names").val("");
                            $("#email").val("");                         
                        }
                        else
                        {
                           sweetAlert("Error", data, "error");
                        }
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
        <div class="row">
            <div class="col-lg-4 col-md-4"></div>
            <div class="col-lg-4 col-md-4">
                  	<div class="panel panel-default">
                      <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>New User</h1></div>
                        <div class="panel-body">

                            <form role="form" method="POST">
                                <div class="form-group">
                                    <label>User Names</label>
                                    <input class="form-control" id="names" name="names" type="text" placeholder="User Names" required>
                                </div> 
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="form-control"  id="email" name="email" type="email" placeholder="Email" required>
                                </div>                             
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select class="form-control" id="user_type" name="user_type" >
                                          <option value='Administaror'>Administaror</option>  
                                          <option value='Normal User' selected>Normal User</option>            
                                    </select>
                                </div>             
                               
                            </form>
                             <button class="btn btn-default" onclick="submit_data()">Add User</button>

                        </div>
                     </div><!--End Of Panel-->
                 </div>
            <div class="col-lg-4 col-md-4"></div>
       </div>
  </div> <!--End of Middle Container-->
</body>
</html>