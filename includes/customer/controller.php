<?php

if(isset($_GET['file']))
{

$file = $_GET['file'];	

} 
else
{
	$file='view';
	
}
?>



<?php include_once($file.'.php'); ?>