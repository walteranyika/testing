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
    
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="home.php"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span></a>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php  //include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">		
    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-default">
                  <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>User Login</h1></div>
                    <div class="panel-body">
                         <div class="row">
                              <div class="col-lg-2"></div>
                              <div class="col-lg-8">
                                  <form role="form" action="_login.php" method="POST">
                                      <div class="form-group">
                                             <input class="form-control" name="email" type="email" required placeholder="Username">
                                      </div> 
                                       <div class="form-group">
                                             <input class="form-control" name="password" type="password" required placeholder="Password">
                                      </div>
                                      <button type="submit" class="btn btn-default">Login</button>                                                
                                  </form>
                              </div>
                              <div class="col-lg-2"></div>
                         </div>
                    </div>
                 </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>
  
  </div> <!--End of Middle Container-->
</body>
</html>