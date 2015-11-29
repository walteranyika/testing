<?php                     
	include 'connect.php';
	extract($_POST);
	$where_clause=" where company_id='$company_id'";
	if($company_id=="any")
	{
      $where_clause=""; 
	}
	
	$sql="select * from companies $where_clause";
	$results=mysql_query($sql) or die(mysql_error());
	$num=1;
	if(mysql_num_rows($results)>0)
	{
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

	}else
	{
		echo "No Records Found";
	}
?>