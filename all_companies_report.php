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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

      <script src="dist/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="dist/sweetalert.css">
 <script type="text/javascript">
          $(function() 
          {
              $( "#datepicker" ).datepicker();
              $( "#datepicker2" ).datepicker();
          });
          function get_details ()
          {
                  var company = $('#dropDownId').val();
                  var from = $("#datepicker").val();
                  var to =   $("#datepicker2").val();   

                  var from_array = from.split("/");
                  var to_array = to.split("/");
                  var tod = to_array[2]+"-"+to_array[0]+"-"+to_array[1];
                  var fromd = from_array[2]+"-"+from_array[0]+"-"+from_array[1];
                  console.log(company);
                  console.log(fromd);
                  console.log(tod);

                  $.post(    "_all_contribution.php",
                             {company_id:company, dfrom:fromd, dto:tod},
                             function(data,status)
                             {
                                console.log(data);
                                if(data.indexOf("No Items Found")==-1)
                                {
                                  $('table tr.myrow').remove();
                                  $('#myTable>tbody:last-child').append(data);                                    
                                }
                                else
                                {
                                  $('table tr.myrow').remove();
                                  sweetAlert("Oops...", "No Records Found For This Company Within Specified Date Range", "error");
                                }
                          });
                 
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
                  <div class="col-lg-5 col-md-5 col-sm-4"></div>    
                  <div class="col-lg-2 col-md-2 col-sm-4">
                      <div class="input-group">
                           <select class="form-control" name="company" id="dropDownId" >
                             <option value='all'>All Companies</option>
                              <?php
                                include 'connect.php';
                                $sql="select * from companies";
                                $results = mysql_query($sql);
                                while($row= mysql_fetch_row($results))
                                {
                                  $cname =$row[2];
                                  $cid = $row[0];
                                  echo "<option value='$cid'>$cname</option>";
                                }
                              ?>
                          </select>
                      </div><!-- /input-group -->

                      <div class="input-group">
                          <input type="text" class="form-control" id="datepicker" placeholder="FROM DATE" required>
                      </div><!-- /input-group -->

                      <div class="input-group">
                           <input type="text" class="form-control" id="datepicker2" placeholder="TO DATE"  required>
                      </div><!-- /input-group -->

                      <div class="input-group">                             
                            <button class="btn btn-default" type="button" onclick="get_details()">Get Report</button>                     
                      </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <div class="col-lg-5 col-md-5 col-sm-4"></div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
           <div class="panel-heading">Contributions Report</div>
            <!-- Table -->
            <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Member's Name</th>
                            <th style="text-align: center;">Company</th>
                            <th style="text-align: center;">Contribution</th>
                            <th style="text-align: center;">Date</th>
                        </tr>                        
                    </thead>
                    <tbody>
                      <?php
                         include 'connect.php';
                          $sql="SELECT  
                                contributions.contribution_id, 
                                members.names,
                                contributions.date_contributed,
                                contributions.contribution_amt,
                                companies.name
                                FROM    members 
                                INNER JOIN contributions ON members.meber_id=contributions.member_id
                                INNER JOIN(
                                SELECT company_id, name FROM companies 
                                )companies ON companies.company_id=members.company_id";
                         $results=mysql_query($sql);
                         $num=1;
                         while ($row=mysql_fetch_row($results)) 
                         {
                            $id=$row[0]; 
                            $names=$row[1];
                            $date=$row[2];  
                            $amount=$row[3];
                            $company=$row[4];
                              echo "<tr id='$id' class='myrow'>
                                        <td>$num</td>
                                        <td>$names</td>
                                        <td>$company</td>
                                        <td>$amount</td>
                                        <td>$date</td>
                                  </tr>";
                           $num++;       
                         }
                      ?>
                    </tbody>
            </table>

        </div>
 </div> <!--End of Middle Container-->
</body>
</html>