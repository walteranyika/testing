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
      <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>New Applicant</h1></div>
        <div class="panel-body">
             <div class="row">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                                <form role="form" action="_add_applicant.php" method="POST">
                                    <div class="form-group">
                                        <label>Member Names</label>
                                        <input class="form-control" name="names" type="text" required placeholder="Member Names" required>
                                    </div> 

                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" name="gender" value="Male"checked>Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender"  value="Female">Female</label> 
                                    </div>

                                    <div class="form-group">
                                        <label>Date Joined</label>
                                        <input class="form-control" name="date" type="date" required placeholder="Date Joined" required>
                                    </div>                                      

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" name="phone" type="text" required placeholder="Phone Number" required>
                                    </div> 

                                    <div class="form-group">
                                        <label>National ID</label>
                                        <input class="form-control" name="idnumber" type="number" required placeholder="National ID Number" required>
                                    </div> 

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input class="form-control" name="designation" type="text" required placeholder="Designation" required>
                                    </div> 

                                    <div class="form-group">
                                        <label>Location</label>
                                        <input class="form-control" name="location" type="text" required placeholder="Location" required>
                                    </div> 
                                    
                                    <div class="form-group">
                                            <label>Your Company</label>
                                            <select class="form-control" name="company" >
                                              <?php
                                                  include 'connect.php';
                                                  $sql="select * from companies";
                                                  $results = mysql_query($sql);
                                                  while($row= mysql_fetch_row($results))
                                                  {
                                                    $cname =$row[2];
                                                    $cid =$row[0];
                                                    echo "<option value='$cid'>$cname</option>";
                                                  }
                                                ?>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Employment Number(If Available)</label>
                                        <input class="form-control" name="enumber" type="text" required placeholder="Employment Number">
                                    </div> 
                                    <button type="submit" class="btn btn-default">Add Member</button>
                                    <button type="reset" class="btn btn-default">Clear Fields</button>
                                </form>
                  </div>
                  <div class="col-lg-3"></div>
             </div>
        </div>
     </div>
  </div> <!--End of Middle Container-->
</body>
</html>