<?php
     include 'connect.php';
     extract($_POST);
	 $sql="SELECT  contributions.contribution_id, members.names,contributions.date_contributed, contributions.contribution_amt 
	       FROM   members INNER JOIN contributions ON
	       members.meber_id=contributions.member_id  WHERE members.national_id='$id'  AND 
	       contributions.date_contributed>= '$dfrom' AND contributions.date_contributed<= '$dto' ";
	 $results=mysql_query($sql);
	 $num=1;
	 if(mysql_num_rows($results)>0)
	 {
				 while ($row=mysql_fetch_row($results)) 
				 {
					    $id=$row[0]; 
					    $names=$row[1];
					    $date=$row[2];  
					    $amount=$row[3];
					      echo "<tr>
					                <td>$num</td>
					                <td>$names</td>
					                <td>$amount</td>
					                <td>$date</td>
					                <td><a href='edit.php?id=$id'>Edit</a></td>
					                <td><a href='delete.php?id=$id'>Edit</a></td>
					             </tr>";
					   $num++;       
				 }   
	 }else
	 {
        echo "No Items Found";
	 }

?>