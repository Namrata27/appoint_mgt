<html>
<body>
<?php
include($_SERVER['DOCUMENT_ROOT']."/Travel/connection.php");
$id=$_GET['id'];
if(isset($_GET['id']))
{
		$qry=$db->query("DELETE FROM category WHERE c_id='$id'");
		if($qry)
		{
				echo "Record deleted successfully";
		}
	}

?>
</body>