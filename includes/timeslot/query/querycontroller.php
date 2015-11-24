<?php
if(isset($_POST['timeslotsubmit']))
{
		
	$starttime=$_POST['starttime'];
	//print_r($starttime) ;
	$array=array();
	if(isset($_POST['fullday']))
	{
		
	foreach($_POST['fullday'] as $key=>$value)
	{
		$array[$key]=array('day'=>$key,'Morning_starttime'=> $_POST['starttime'][$key],'Morning_endtime'=> $_POST['endtime'][$key],'Evening_starttime'=> $_POST['starttime1'][$key],'Evening_endtime'=> $_POST['endtime1'][$key]);
		
		
	}
		}
		
	//print_r($_POST['weekly_off']);
	if(isset($_POST['weekly_off']))
	{
	foreach($_POST['weekly_off'] as $key=>$value)
	{
		$array[$key]=array('day'=>$key,'Morning_starttime'=> $_POST['starttime'][$key],'Morning_endtime'=> $_POST['endtime'][$key],'Evening_starttime'=> $_POST['starttime1'][$key],'Evening_endtime'=> $_POST['endtime1'][$key]);
		
		
	}
	}
	
	//print_r($array);
	
	$json_encode=json_encode($array);
	
	
	$my_file = $_SERVER['DOCUMENT_ROOT'].'/appoint_mgt/includes/companyconfig/companyconfig.txt';
	
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	
	$data = $json_encode;
	
	fwrite($handle, $data);
	//print_r($json_encode);
	
}
?>