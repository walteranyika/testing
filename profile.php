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
        <a href="index.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>
    </div>    
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="everyone.php"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php  include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">	
    <div class="row">
       <div class="col-lg-4 col-md-3 col-sm-2"></div>
       <div class="col-lg-4 col-md-6 col-sm-8">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                               <h1>My Profile Information</h1>
                            </div>
                            <div class="panel-body">
                               <div class="list-group">
                                  <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">User Names</h4>
                                    <p class="list-group-item-text"><?php echo $_SESSION['names']; ?></p>
                                  </a>
                                  <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">Email</h4>
                                    <p class="list-group-item-text"><?php echo $_SESSION['email']; ?></p>
                                  </a>
                                  <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">System User Type</h4>
                                    <p class="list-group-item-text"><?php echo $_SESSION['type']; ?></p>
                                  </a>
                                </div>
                            </div>                                 
                          </div><!--End of panel-->   

       </div> 
       <div class="col-lg-4 col-md-3 col-sm-2"></div> 	
    </div>  
  </div> <!--End of Middle Container-->
</body>
</html>


