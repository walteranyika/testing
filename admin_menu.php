<!-- button-->
<div class="btn-group">
	<a href="home.php" type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span>
	   Home
	</a>  	
</div>	
		
<!-- button-->
<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">
	   </span>Applicants<span class="caret"></span> 					
  	</button>
  	<ul class="dropdown-menu" role="menu">
		<li><a href="add_applicant.php">New Applicants</a></li>
		<li><a href="all_applicants.php">View All Applicants</a></li>
  	</ul>
</div>		
				
<!-- button-->
<div class="btn-group">
   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-hdd">
     </span>Companies <span class="caret"></span>
   </button>
   <ul class="dropdown-menu" role="menu">
	   <li><a href="new_company.php">Add a Company</a></li>
	   <li><a href="all_companies.php">All Companies</a></li>
   </ul>
</div>		
				
<!-- button-->
<div class="btn-group">
  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-star-empty">
	  </span>Contributions <span class="caret"></span>
  	</button>
  	<ul class="dropdown-menu" role="menu">
		<li><a href="add_contribution.php">Add Contribution</a></li>
		<li><a href="all_contribution.php">View all</a></li>
    </ul>
</div>
				
				
<!-- button-->
<div class="btn-group">
  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe">
	  </span>Reports <span class="caret"></span>
  	</button>
  	   <ul class="dropdown-menu" role="menu">
			   <li><a href="member_contribution_report.php">Individual Member</a></li>
			   <li><a href="all_companies_report.php">Company</a></li>
			   <li><a href="all_contributions_report.php">All Contributions</a></li>
  	   </ul>
</div>

<!-- button-->
<div class="btn-group">
  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe">
	  </span>My Profile<span class="caret"></span>
  	</button>
  	   <ul class="dropdown-menu" role="menu">
			   <li><a href="password_reset.php">Reset My Password</a></li>
			   <li><a href="profile.php">Profile Info</a></li>
  	   </ul>
</div>

<?php
  //session_start();
  
  if( isset($_SESSION["type"]) && "Administrator"==$_SESSION["type"])
  {
  	//echo "Working";
   echo '<div class="btn-group">
			  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe">
				  </span>Admin<span class="caret"></span>
			  	</button>
			  	   <ul class="dropdown-menu" role="menu">
						   <li><a href="add_user.php">Add User</a></li>
						   <li><a href="all_users.php">View Users</a></li>
						   <!--<li><a href="approve.php">Pending Members</a></li>-->
						   <li><a href="login_history.php">Login History</a></li>
			  	   </ul>
		 </div>';
  }

?>		     
                               