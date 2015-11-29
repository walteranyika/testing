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
             var userId =$("#user_id").val(); 
             console.log(namesd +" "+emaild +" "+user_typed);  

             $.post('_edit_user.php',
                     {names:namesd,  email:emaild,  user_type:user_typed, user_id: userId},
                     function(data,status)
                     {
                        console.log(data);
                        if(data.indexOf("Success")!= -1)
                        {
                          setTimeout(show_alert(), 3000);                                            
                        }
                        else
                        {
                           sweetAlert("Error", data, "error");
                        }
                     }
              );
          }

          function show_alert () 
          {
             swal("Success", "User Details have been updated", "success");
             $(location).attr('href','all_users.php') ;   
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
      <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span>Edit User Details</h1></div>
        <div class="panel-body">
             <div class="row">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                  <?php
                     include 'connect.php';
                     extract($_GET);
                     $sql="SELECT * FROM `users` WHERE `user_id`='$user_id'";
                     $results=mysql_query($sql);
                     $row=mysql_fetch_row($results);
                     $names=$row[1]; 
                     $email=$row[2]; 
                     $type=$row[4]; 
                     $selected1="";
                     $selected2="";                          
                     if($type=="Administator")
                     {
                       $selected1="selected";
                     }else
                     {
                       $selected2="selected";
                     }
                  ?>

                      <form role="form" method="POST">
                          <div class="form-group">
                              <label>User Names</label>
                              <input class="form-control" id="names" name="names" value="<?php echo $names; ?>" type="text" placeholder="User Names" required>
                              <input class="form-control" id="user_id"  value="<?php echo $user_id; ?>" type="hidden">
                         
                          </div> 
                          <div class="form-group">
                              <label>Email Address</label>
                              <input class="form-control"  id="email" name="email" value="<?php echo $email; ?>" type="email" placeholder="Email" required>
                          </div>                             
                          <div class="form-group">
                              <label>User Type</label>
                              <select class="form-control" id="user_type" name="user_type" >
                                    <option value='Administaror' <?php echo $selected1; ?>>Administaror</option>  
                                    <option value='Normal User' <?php echo $selected2; ?>>Normal User</option>            
                              </select>
                          </div>                               
                      </form>
                       <button class="btn btn-default" onclick="submit_data()">Edit User</button>
                  </div>
                  <div class="col-lg-3"></div>
             </div>
        </div>
     </div>
  </div> <!--End of Middle Container-->
</body>
</html>