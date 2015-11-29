<?php   
    include 'connect.php';
    extract($_POST);//
    if(isset($_POST['company_id']))
     {
       $sql = "DELETE FROM `companies` WHERE `company_id`='$company_id'"
       mysql_query($sql);
       echo "Deleted Succesfully Record $company_id";
    }
    else( isset($_POST['member_id']) )
    {
       $sql = "DELETE FROM `members` WHERE `meber_id`='$member_id'"
       mysql_query($sql);
       echo "Deleted Succesfully Record"; 
    }
    else( isset($_POST['contribution_id']) )
    {
       $sql = "DELETE FROM `contributions` WHERE `contribution_id`='$contribution_id'"
       mysql_query($sql);
       echo "Deleted Succesfully Record"; 
    }
//contribution


?>