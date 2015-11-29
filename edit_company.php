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
      <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Edit  Company Details</h1></div>
        <div class="panel-body">
             <div class="row">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
               <?php
                     include 'connect.php';
                     extract($_GET);
                     $sql="SELECT * FROM `companies` WHERE `company_id`='$company_id'";
                     $results=mysql_query($sql);
                     $row=mysql_fetch_row($results);
                     $name=$row[2]; 
                     $category=$row[1]; 
                     $address=$row[3]; 
                     $selected1="";
                     $selected2="";
                     if($category=="CBA")
                     {
                       $selected1="selected";
                     }else
                     {
                       $selected2="selected";
                     }
                  ?>
                                <form role="form" action="_edit_company.php" method="POST">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input class="form-control" name="name" value="<?php echo $name;?>" type="text" required placeholder="Company Name" required>
                                        <input type="hidden" name="company_id" value="<?php echo $company_id; ?>" >
                                    </div> 
                                    <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" >
                                                <option value="CBA" <?php echo $selected1;?> >CBA</option>
                                                <option value="RA" <?php echo $selected2;?>>RA</option>                                                
                                            </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" name="address" value="<?php echo $address;?>" type="text" required placeholder="Company Address" required>
                                    </div>         

                                    <button type="submit" class="btn btn-default">Edit Company</button>
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