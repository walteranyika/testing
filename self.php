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
             var genderd =$("#male").is(':checked') ? "Male": "Female";
             var phoned =$("#phone").val(); 
             var idnumberd =$("#idnumber").val(); 
             var designationd =$("#designation").val(); 
             var locationd =$("#location").val(); 
             var companyd =$("#company").val(); 
             var enumberd =$("#enumber").val(); 
             console.log(genderd);  
            if( !isEmpty(namesd) && !isEmpty(phoned) && !isEmpty(idnumberd)&& !isEmpty(designationd)&& !isEmpty(locationd) )
            {
              $.post('_self.php',
                       { names:namesd,  gender:genderd,  phone:phoned, idnumber: idnumberd,
                         designation:designationd, location:locationd, company:companyd, enumber:enumberd},
                         function(data,status)
                         {
                            console.log(data);
                            if(data.indexOf("Success")!= -1)
                            {
                                   swal("Thank You", "You have successfully submitted your details.", "success"); 
                                   $("#names").val("");  
                                   $("#phone").val("");
                                   $("#idnumber").val(""); 
                                   $("#designation").val("");
                                   $("#location").val(""); 
                                   $("#enumber").val("");                                             
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
                   sweetAlert("Empty Fields!!!", "Empty Fields. Fill In All The Fields", "error");             
            }
          } 

          function isEmpty(str)
          {
             return (0===str.length);
          }         
      </script>
</head>

<body style="background-color:#00838f">
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="#"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span></a>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php // include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">		
  	<div class="panel panel-default">
      <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Self Member Registration</h1></div>
        <div class="panel-body">
             <div class="row">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                                <form role="form" action="_add_member.php" method="POST">
                                    <div class="form-group">
                                        <label>Member Names</label>
                                        <input class="form-control" name="names" id="names" type="text" required placeholder="Member Names" required>
                                    </div> 

                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" id="male" name="gender" value="Male"checked>Male</label>
                                        <label class="radio-inline"><input type="radio" id="female" name="gender"  value="Female">Female</label> 
                                    </div>
                               

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" name="phone" id="phone" type="text" required placeholder="Phone Number" required>
                                    </div> 

                                    <div class="form-group">
                                        <label>National ID</label>
                                        <input class="form-control" name="idnumber" id="idnumber" type="number" required placeholder="National ID Number" required>
                                    </div> 

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input class="form-control" name="designation" id="designation" type="text" required placeholder="Designation" required>
                                    </div> 

                                    <div class="form-group">
                                        <label>Location</label>
                                        <input class="form-control" name="location" id="location" type="text" required placeholder="Location" required>
                                    </div> 
                                    
                                    <div class="form-group">
                                            <label>Your Company</label>
                                            <select class="form-control" name="company" id="company" >
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
                                        <input class="form-control" name="enumber" id="enumber" type="text" required placeholder="Employment Number">
                                    </div> 
                                </form>
                                 <button type="submit" class="btn btn-default" onclick="submit_data()">Add Member</button>
                  </div>
                  <div class="col-lg-3"></div>
             </div>
        </div>
     </div>
  </div> <!--End of Middle Container-->
</body>
</html>