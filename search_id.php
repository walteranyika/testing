<?php

include 'connect.php';
extract($_POST);
$res = mysql_query("SELECT * FROM `members` WHERE `national_id`='$id'");
if(mysql_num_rows($res)>0)
{
  $row= mysql_fetch_row($res);
  $national_id= $row[4];
  $member_names=$row[1];
  $member_id=$row[0];
  $data= array( "nid"=>$national_id, "names"=>$member_names,"mid"=>$member_id);
  echo  json_encode($data);
}else
{
	echo "No Items Found With This ID";
}


?>