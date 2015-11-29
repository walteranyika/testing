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
          $(document).ready(function(){
               $("#form_data").hide();
               //$("#main_panel").hide();
          });
          function get_details ()
          {
            $("#form_data").hide();
            var text = $("#input_id").val();
            console.log(text);
            if(text.length > 6)
            {
              $("#n_id").val("");
              $("#m_names").val("");
              $("#m_id").val("");
              console.log("Started sending "+text);
              $.post("search_id.php",
                      {id: text},
                      function(data,status)
                      {
                        console.log(data);
                        if(data.indexOf("No Items Found")== -1)
                        {
                              $("#form_data").show();
                              var obj = $.parseJSON(data);
                              console.log(obj);
                              $("#n_id").val(obj.nid);
                              $("#m_names").val(obj.names);
                              $("#m_id").val(obj.mid);
                        }else
                        {
                            sweetAlert("Oops...", "No Records Found With ID Number "+text, "error");
                        }
                      });
            }
            else
            {
                  sweetAlert("Error", "Invalid ID Number", "error");
            }
          }
          function submit_data()
          {
             console.log("Button Clicked");
             var member_id=$("#m_id").val();
             var date =$("#date").val();
             var amount =$("#amount").val(); 
             var namesd=$("#m_names").val();            
             $.post('_add_contribution.php',
                     {mid:member_id,tarehe:date,amt:amount,names:namesd},
                     function(data,status)
                     {
                      if(data.indexOf("Success")!= -1)
                      {
                          sweetAlert("Success", data, "success");
                          $("#input_id").val("");
                          $("#form_data").hide();
                          $("#n_id").val("");
                          $("#m_names").val("");
                          $("#m_id").val("");
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
      <div class="col-lg-5"></div>    
      <div class="col-lg-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Enter Member ID..." id="input_id">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="get_details()">Go!</button>
            </span>
          </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
      <div class="col-lg-5"></div>
    
    </div>
  	<div class="panel panel-default" id="form_data">
      <div class="panel-heading" ><h1><span class="glyphicon glyphicon-user"></span>Add Monthly Contibution</h1></div>
        <div class="panel-body">
             <div class="row">
                  <div class="col-lg-4" class="col-md-4"></div>
                  <div class="col-lg-4" class="col-md-4">
                          <form role="form" method="POST">
                              <div class="form-group">
                                  <label>National ID</label>
                                  <input class="form-control" name="nat_id" type="text" readonly required placeholder="Member ID" id="n_id">
                                  <input class="form-control" name="member_id" type="hidden" readonly id="m_id">
                              </div> 

                              <div class="form-group">
                                  <label>Member Names</label>
                                  <input class="form-control" name="names" type="text"  readonly required placeholder="Member Names" id="m_names">
                              </div>

                               <div class="form-group">
                                  <label>Date Contributed</label>
                                  <input class="form-control" name="date" type="date" required placeholder="Date" required id="date">
                              </div> 

                              <div class="form-group">
                                  <label>Amount</label>
                                  <input class="form-control" name="amount" type="number" required placeholder="Amount" required id="amount">
                              </div>                                                          
                          </form>
                           <button  class="btn btn-default" onclick="submit_data()">Add Contibution</button> 
                  </div>
                  <div class="col-lg-4" class="col-md-4"></div>
             </div>
        </div>
     </div>
  </div> <!--End of Middle Container-->
</body>
</html>