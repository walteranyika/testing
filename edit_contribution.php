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
      <script src="dist/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
      <!-- End WOWSlider.com HEAD section -->   
      <script type="text/javascript">
          function edit_contribution()
          {
             console.log("Button Clicked");
             var contribution_id=$("#c_id").val();
             var date =$("#date").val();
             var amount =$("#amount").val();             
             $.post('_edit_contribution.php',
                     {c_id:contribution_id,tarehe:date,amt:amount},
                     function(data,status)
                     {
                          if(data.indexOf("Success")!= -1)
                          { 
                              swal("Saved SuccessFully!", "You have successfully edited the record", "success")
                              $("#form_data").hide();
                              $("#n_id").val("");
                              $("#m_names").val("");
                              $("#m_id").val("");
                          }
                          else
                          {
                             sweetAlert("Error", "Could Not Update", "error");
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
     <?php  
         include 'connect.php';
         extract($_GET);
         $sql=" SELECT contributions.member_id, contributions.date_contributed, contributions.contribution_amt, members.names, members.national_id
                FROM contributions
                INNER JOIN members ON contributions.member_id = members.meber_id WHERE  contributions.contribution_id='$contribution_id'";
         $results=mysql_query($sql);
         $row=mysql_fetch_row($results);
         $nat_id=$row[4]; 
         $member_id=$row[0]; 
         $names=$row[3]; 
         $date=$row[1]; 
         $amount=$row[2]; 
     ?>
  	<div class="panel panel-default" id="form_data">
      <div class="panel-heading" ><h1><span class="glyphicon glyphicon-user"></span>Edit Member Monthly Contibution</h1></div>
        <div class="panel-body">
             <div class="row">
                  <div class="col-lg-4" class="col-md-4"></div>
                  <div class="col-lg-4" class="col-md-4">
                          <form role="form" method="POST">
                              <div class="form-group">
                                  <label>National ID</label>
                                  <input class="form-control" name="nat_id" value="<?php echo $nat_id  ?>" type="text" readonly required placeholder="Member ID" id="n_id">
                                  <input class="form-control" name="member_id"  value="<?php echo $member_id  ?>" type="hidden" readonly id="m_id">
                                  <input class="form-control" name="contribution_id"  value="<?php echo $contribution_id  ?>" type="hidden" readonly id="c_id">
                              </div> 

                              <div class="form-group">
                                  <label>Member Names</label>
                                  <input class="form-control" name="names" type="text"   value="<?php echo $names  ?>" readonly required placeholder="Member Names" id="m_names">
                              </div>

                               <div class="form-group">
                                  <label>Date Contributed</label>
                                  <input class="form-control" name="date" type="date"  value="<?php echo $date ?>" required placeholder="Date" required id="date">
                              </div> 

                              <div class="form-group">
                                  <label>Amount</label>
                                  <input class="form-control" name="amount" type="number"  value="<?php echo $amount  ?>" required placeholder="Amount" required id="amount">
                              </div>                                                                                      
                          </form>
                           <button  class="btn btn-default" onclick="edit_contribution()" type="submit">Edit Contibution</button>  
                           
                  </div>
                  <div class="col-lg-4" class="col-md-4"></div>
             </div>
        </div>
     </div>
  </div> <!--End of Middle Container-->
</body>
</html>