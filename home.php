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
    		<div class="panel-heading">
           <h1>Our Mission and Vision</h1>
        </div>
          <div class="panel-body"><br><br>
          <div>
              		<!-- Start WOWSlider.com BODY section -->
                				<div id="wowslider-container1">
                				<div class="ws_images">
                              <ul>
                    						<li><img src="data1/images/paul_i.jpg" alt="" title="" id="wows1_0"/></li>
                    						<li><img src="data1/images/paul_ii.jpg" alt="" title="" id="wows1_1"/></li>
                    						<li><img src="data1/images/paul_iii.jpg" alt="" title="" id="wows1_2"/></li>
                    						<li><img src="data1/images/paul_iv.jpg" alt="" title="" id="wows1_3"/></li>
                    						<li><img src="data1/images/paul_v.jpg" alt="" title="" id="wows1_4"/></li>
                    						<li><a href="http://wowslider.net"><img src="data1/images/paul_xx.jpg" alt="jquery carousel" title="" id="wows1_5"/></a></li>
                    						<li><img src="data1/images/paul_xxxc__copy.jpg" alt="" title="" id="wows1_6"/></li>
                    					 </ul>
                          </div>
                  					<div class="ws_bullets">
                                <div>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_i.jpg" alt=""/>1</span></a>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_ii.jpg" alt=""/>2</span></a>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_iii.jpg" alt=""/>3</span></a>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_iv.jpg" alt=""/>4</span></a>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_v.jpg" alt=""/>5</span></a>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_xx.jpg" alt=""/>6</span></a>
                      						<a href="#" title=""><span><img src="data1/tooltips/paul_xxxc__copy.jpg" alt=""/>7</span></a>
                      					</div>
                            </div>
                          <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">http://wowslider.net/</a> by WOWSlider.com v8.6</div>
                				<div class="ws_shadow">
                          
                        </div>
                				</div>	
                				<script type="text/javascript" src="engine1/wowslider.js"></script>
                				<script type="text/javascript" src="engine1/script.js"></script>
              				<!-- End WOWSlider.com BODY section -->                    
                      <div class="middle_text">
                          <p><strong> Our Vision is to be A vibrant Trade union of choice.<br/>Our Mission To transform and empower private security guards through ardent championing for their rights, freedoms, privileges, welfare and social economic well-being,through engagement, negotiation, co-operation and Collective Bargaining Agreements. </strong></p>
                      </div>                          
                      <div class="text_para_home" >
                          <p style="font-size:15pt;text-decoration:blink;">Motto : Tusimame Pamoja!</p>         
                      </div>   
             </div>            	                   
  	      </div><!--End of panel-->
    </div> <!--End of Middle Container-->
</body>
</html>