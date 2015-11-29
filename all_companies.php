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

      <script src="dist/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
      <script type="text/javascript">
            $(function() 
            {
              $('.btn_del').on('click', function()
              {
                    var button = $(this);
                    var parentTd = button.parent('td');
                    var parentTr = parentTd.parent('tr');
                    var id = parentTr.attr('id');
                    //alert(id);
                    show_alert(id) 

              }); 
            });

            function show_alert(id)
            {

              swal({
                      title: "Are you sure?",
                      text: "You will not be able to recover this Record After Deletion!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Yes, Delete",
                      cancelButtonText: "No, Cancel",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm)
                    {
                      if (isConfirm) 
                      {
                        swal("Deleted!", "This record has been deleted From The Database.", "success");
                        delete_row(id);
                      } 
                      else 
                      {
                          swal("Cancelled", "Your Record Is Safe:)", "error");
                      }
                    });
            }

            function delete_row(idval)
            {
                $.post("delete.php",
                      {company_id: idval },
                      function(data,status)
                      {
                        console.log(data);
                       swal("Deleted!", data, "success");
                      }
                     );
         
            }
            function fetch_data()
            {
               event.preventDefault();
               var cid = $("#company").val();
               //console.log(nid);  
               console.log(cid);
               $.post('_company_search.php',
               {company_id:cid}, 
               function(data, status)
               {  
                    console.log(data);
                    if(data.indexOf("No Records Found")==-1)
                    {
                        $('table tr.myrow').remove();
                        $('#myTable>tbody:last-child').append(data);                                   
                    }
                    else
                    {
                      $('.myrow').remove();
                      sweetAlert("Oops...", "No Records Found For This Company", "error");
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
        <form  onsubmit="fetch_data()" class="form-inline" role="form" id="login_form">
                <div class="form-group">
                  <label for="cname">Filter: By Company</label>
                        <select class="form-control" name="company" id="company" >
                        <option value='any'>All Companies</option>
                            <?php
                                include 'connect.php';
                                $sql="select * from companies";
                                $results = mysql_query($sql);
                                while($row= mysql_fetch_row($results))
                                {
                                  $cname =$row[2];
                                  $cid =$row[0];
                                  $selected="";
                                  if($cname=="Private")
                                  {
                                     $selected="selected";
                                  }
                                  echo "<option value='$cid' $selected>$cname</option>";
                                }
                              ?>
                        </select>
                </div>
               <!-- <div class="form-group">
                  <label for="nat_id">Or By Applicant National ID:</label>
                  <input type="number" class="form-control" id="nat_id" placeholder="Applicant ID">
                </div>--> 
                 <button class="btn btn-default">Search</button>   
          </form>         
         
       </div><!--End Of Row-->

        <div class="panel panel-default">
            <!-- Default panel contents -->
           <div class="panel-heading">All Comapnies</div>
            <!-- Table -->
            <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Category</th>
                            <th style="text-align: center;">Address</th>
                            <th style="text-align: center;">Date Joined</th>
                            <th style="text-align: center;" colspan="2">Operation</th>
                        </tr>                        
                    </thead>
                    <tbody>
                      <?php
                         include 'connect.php';
                         $sql="select * from companies";
                         $results=mysql_query($sql);
                         $num=1;
                         while ($row=mysql_fetch_row($results)) 
                         {
                            $id=$row[0]; $name=$row[2]; $category=$row[1]; $address=$row[3];  $date=$row[4]; 
                            echo "<tr id='".$id."' class='myrow'>
                                        <td>$id</td>
                                        <td>$name</td>
                                        <td>$category</td>
                                        <td>$address</td>
                                        <td>$date</td>
                                        <td><a href='edit_company.php?company_id=$id'>Edit</a></td>
                                        <td><button class='btn_del'>Delete</button></td>
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