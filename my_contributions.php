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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

      <script src="dist/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="dist/sweetalert.css">
      <!-- End WOWSlider.com HEAD section -->
      <script type="text/javascript">
          $(function() 
          {
              $( "#datepicker" ).datepicker();
              $( "#datepicker2" ).datepicker();
          });
          function get_details ()
          {
                
                  var text = $("#input_id").val();
                  var from = $("#datepicker").val();
                  var to =   $("#datepicker2").val();
                  var phoned =   $("#phone").val();
                  var from_array = from.split("/");
                  var to_array = to.split("/");
                  var tod = to_array[2]+"-"+to_array[0]+"-"+to_array[1];
                  var fromd = from_array[2]+"-"+from_array[0]+"-"+from_array[1];
                  // console.log(text);
                  // console.log(fromd);
                  // console.log(tod);
                  if(text.length > 6)
                  {
                      $.post( "_my_contribution.php",
                             {id:text, dfrom:fromd, dto:tod,phone:phoned},
                             function(data,status)
                             {
                              console.log(data);
                              if(data.indexOf("No Items Found")==-1)
                              {
                                $('.data_row').remove();
                                $('#myTable>tbody:last-child').append(data);                                    
                              }
                              else
                              {
                                $('.data_row').remove();
                                sweetAlert("Oops...", "No Records Found With ID Number "+text, "error");
                              }
                             });
                  } 
                  else
                  {
                      sweetAlert("Wrong National ID Number", "Check The National ID Number", "error");
                  }
          }
      </script>
</head>

<body style="background-color:#00838f">
    
 
    <div class="img_home_pos" >
        <a style="color:#212121; text-decoration:none" href="everyone.php"><img src="images/logo.png" height="90"alt=UMS/><span class="header_pos">Kenya National Private Security Workers Union</span></a>
    </div><br>                        
    <div class="dropdownmenu_container">
         <?php // include 'admin_menu.php'; ?>			     
    </div>		
 <div class="container_middle">	
     <div class="row">  
      <div class="col-lg-5 col-md-4 col-sm-3"></div>    
      <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="input-group">
              <input type="text" class="form-control" id="datepicker" placeholder="FROM" required>
          </div><!-- /input-group -->

          <div class="input-group">
               <input type="text" class="form-control" id="datepicker2" placeholder="TO"  required>
          </div><!-- /input-group -->

          <div class="input-group">
               <input type="text" class="form-control" id="phone" placeholder="Phone Number"  required>
          </div><!-- /input-group -->

          <div class="input-group">
            <input type="number" class="form-control" placeholder="National ID..." id="input_id"  required>
            <span class="input-group-btn">            
                <button class="btn btn-default" type="button" onclick="get_details()">Check!</button>
            </span>
          </div><!-- /input-group -->

      </div><!-- /.col-lg-6 -->
      <div class="col-lg-5 col-md-4 col-sm-3"></div>
   
    </div>	
        <div class="panel panel-default">
            <!-- Default panel contents -->
           <div class="panel-heading">Individual Member Contributions</div>
            <!-- Table -->
            <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Member's Name</th>
                            <th style="text-align: center;">Contribution</th>
                            <th style="text-align: center;">Date</th>
                        </tr>                        
                    </thead>
                    <tbody>
                       
                    </tbody>                   
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>