<?php
global $message;
if(isset($_POST['submit']))
{
$catname=$_POST['categorytitle'];

$catdesc=$_POST['categorydesc'];

$logic=$_POST['logic'];

global $message;

$status=$_POST['s1'];

			
$res =$db->query("INSERT INTO category VALUES('','$catname','$catdesc','$logic','$status')");
		//	$r=mysql_query($res);
		echo $res;
			if($res)
			{
				$message="Category Added Successfully..!!";
			
			}
			else
			{
				$message="Fail to insert Category..!!";
			}			
			}
?>
<?php

include($_SERVER['DOCUMENT_ROOT']."/TRAVEL/connection.php");

if(isset($_GET['id']))
{
$id=$_GET['id'];

if(isset($_POST['add_edit']))
{
$name=$_POST['title'];

$desc=$_POST['description'];

$logic=$_POST['logic'];

$status=$_POST['s1'];

$qry=$db->query("UPDATE category SET c_title='$name',c_description='$desc',logic='$logic',rowstatus='$status' WHERE c_id='$id'");

if($qry)
{
					
	$message="Category updated Successfully..!!";
}

}

}
/* $query1=$db->get_row("SELECT * FROM category WHERE c_id='$id'"); */






?>