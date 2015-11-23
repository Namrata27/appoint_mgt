<html>
<body>
<?php
if(isset($_GET['filename']))
{
$filename= $_GET['filename'];
unlink($filename);
header("location:".$_SERVER['HTTP_REFERER']);
}
include($_SERVER['DOCUMENT_ROOT']."/Travel/connection.php");

if(isset($_GET['id']))
{
$tablename=$_GET['tablename'];

$colname=$_GET['colname'];
$id=$_GET['id'];
if($tablename=='batch_campers_allocation')
{
$db->query("DELETE FROM  $tablename  WHERE $colname=$id");
}
else
{
		$db->query("UPDATE $tablename set rowstatus ='0' WHERE $colname=$id");
		
		}
/* 		$qry=$db->query("DELETE FROM $tablename WHERE $colname='$id'"); */
		if($qry)
		{
				//echo "Record deleted successfully";
		}
	}
	if(isset($_GET['npg_id']))
	{
		
		$npg_id= $_GET['npg_id'];
		$p_id= $_GET['p_id'];
			$status= $_GET['status'];
			
			$precamp_group_present= $db->get_row("SELECT * FROM precamp_group_present WHERE pgp_npg_id='$npg_id' AND pgp_p_id='$p_id'");
			
if($precamp_group_present)
{
$update= $db->query("UPDATE precamp_group_present SET pgp_status='$status' WHERE pgp_npg_id='$npg_id' AND pgp_p_id='$p_id'");
}
else
{
$insert= $db->query("INSERT INTO precamp_group_present VALUES('','$npg_id','$p_id','$status')");
}
	}
	
header("location:".$_SERVER['HTTP_REFERER']);
?>
</body>