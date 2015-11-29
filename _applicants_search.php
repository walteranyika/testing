<?php
  include 'protect.php';
  $type=$_SESSION['type'];
  include 'connect.php';
  extract($_POST);
  $where_clause="";
  if(empty($national_id) && $company_id=="any")
  {
    //$where_clause="`companies`.`company_id`='$company_id'"; 
    $where_clause="";
  }
  else if($company_id!="any" && empty($national_id))
  {
    $where_clause=" AND `companies`.`company_id`='$company_id'"; 
  }
  else if($company_id!="any" && !empty($national_id))
  {
    $where_clause="AND `companies`.`company_id`='$company_id' AND `members`.`national_id`='$national_id'";  
  }
  else if($company_id=="any" && !empty($national_id))
  {
    $where_clause="AND `members`.`national_id`='$national_id'";  
  }

$sql="SELECT `members`.`meber_id`, `members`.`names`, `members`.`gender`, `members`.`phone`, 
     `members`.`national_id`, `members`.`designation`, `members`.`location`, `members`.`employee_no`,
     `members`.`date_applied`, `companies`.`name` FROM `members`
     INNER JOIN `companies` ON `members`.`company_id`=`companies`.`company_id`
     WHERE `members`.`application_status`='Pending'  $where_clause";
$results=mysql_query($sql) or die(mysql_error());
$num=1;
if(mysql_num_rows($results)> 0)
{
			while ($row=mysql_fetch_row($results)) 
			{
					$id=$row[0]; 
					$names=$row[1];
					$gender=$row[2];
					$mobile=$row[3];
					$nid=$row[4];
					$designation=$row[5];
					$location=$row[6];
					$enumber=$row[7];
					$date=$row[8];  
					$company=$row[9];

					echo "<tr id='$id' class='myrow'>
					            <td>$num</td>
					            <td>$names</td>
					            <td>$gender</td>
					            <td>$date</td>
					            <td>$nid</td>
					            <td>$enumber</td>
					            <td>$mobile</td>
					            <td>$designation</td>
					            <td>$location</td>
					            <td>$company</td>";
					       if($type=='Administrator')
					         {
					            echo "<td><a href='edit_member.php?member_id=$id'>Edit</a></td>
					                  <td><button class='btn_del'>Delete</button></td>";
					         }
					   echo"</tr>";
			     $num++;
			}
}else
{
	echo "No Records Found With This ID";
}



?>