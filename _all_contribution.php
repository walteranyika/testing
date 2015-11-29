<?php
	 include 'connect.php';
	 extract($_POST);// {company_id:text, dfrom:fromd, dto:tod},
	 $WHERE="company_id='$company_id'";
	 if($company_id=="all")
	 {
       $WHERE="company_id>'0'";
	 }


	  $sql="SELECT  
	        contributions.contribution_id, 
	        members.names,
	        contributions.date_contributed,
	        contributions.contribution_amt,
	        companies.name
	        FROM    members 
	        INNER JOIN contributions ON members.meber_id=contributions.member_id
	        INNER JOIN(
	        SELECT company_id, name FROM companies WHERE  $WHERE
	        )companies ON companies.company_id=members.company_id  WHERE 
	        contributions.date_contributed>='$dfrom' AND contributions.date_contributed<='$dto' AND members.application_status='Approved'";
	  if(empty($dfrom) && empty($dto) || $dfrom=="undefined--undefined" && $dto=="undefined--undefined")
	  {
		  $sql="SELECT  
		        contributions.contribution_id, 
		        members.names,
		        contributions.date_contributed,
		        contributions.contribution_amt,
		        companies.name
		        FROM    members 
		        INNER JOIN contributions ON members.meber_id=contributions.member_id
		        INNER JOIN(
		        SELECT company_id, name FROM companies WHERE  $WHERE
		        )companies ON companies.company_id=members.company_id WHERE members.application_status='Approved'";
	  }
	  else if(empty($dto)  || $dto=="undefined--undefined")
	  {
		  $sql="SELECT  
		        contributions.contribution_id, 
		        members.names,
		        contributions.date_contributed,
		        contributions.contribution_amt,
		        companies.name
		        FROM    members 
		        INNER JOIN contributions ON members.meber_id=contributions.member_id
		        INNER JOIN(
		        SELECT company_id, name FROM companies WHERE  $WHERE
		        )companies ON companies.company_id=members.company_id  WHERE 
		        contributions.date_contributed>='$dfrom' AND members.application_status='Approved'";
	  }
	  /*$file=fopen("data.txt", "w+");
	  fputs($file,$sql);
	  fclose($file);*/

	 $results=mysql_query($sql);
	 $num=1;
	 if(mysql_num_rows($results)>0){
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
	}else
	{
		echo "No Items Found";
	}



?>