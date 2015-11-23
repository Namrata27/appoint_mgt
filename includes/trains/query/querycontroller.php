<?php

global $message;

if(isset($_POST['submit']))
{
global $message;
			$seo_table=null;
			if($_GET['file']=='create_ticket')
			{
				$type = 'camper_train_group';
			}
			else
			{
				$type = 'camper_trains';
				
				}
				
			if(isset($_GET['ctg_id']) && $_GET['file']=='view_ticket')
{
	$id=$_GET['ctg_id'];
	$seo_table=null;
	$type='camper_train_group';
	$update=Form_Update($type,$id,$seo_table);
	$message="Record Updated succcessfully";
}
			
if(isset($_GET['id']))
{
$seo_table=null;
	$id=$_GET['id'];
	$update=Form_Update($type,$id,$seo_table);
	$message="Record Updated succcessfully";
}
elseif($_GET['file']!='create_ticket')
{								
 $id=Form_insert($type,$seo_table,$_POST);
 $message="Record updated succcessfully";
}

if($_GET['file']=='create_ticket')
			{
/* 				print_r($_POST) */
				
				$css_is = $_POST['css_id'];
				$ctg_tc_id = $_POST['ctg_tc_id'];
/* 					$available_trains=''; */
				$available_trains=$_POST['available_trains'];
				$rowstatus=$_POST['rowstatus'];
				$pnr=$_POST['ctg_pnr'];
				$ticketno=$_POST['ctg_ticketno'];

				//print_r($_POST);
				
			foreach($available_trains as $ct_id)
			{
			
			$camper_train_group= $db->query("INSERT INTO camper_train_group VALUES('','$_GET[bid]','$ct_id','$pnr','$ticketno','$ctg_tc_id','$rowstatus')");
			$id= $db->insert_id;
				if(is_array($css_is) && is_array($available_trains))
				{
				
				
				
				
					$available= $db->get_results("SELECT * FROM camper_train_seatno WHERE cts_ctg_id='$id'");
/* 					$db->debug(); */
					$EXISTING_ARRAY=array();
						if($available)
						{
						foreach($available as $abl)
						{
							$EXISTING_ARRAY[]= $abl->cts_p_id;
						}
						}
						
					foreach($css_is as $cd)
					{
					
					
						$available=$db->get_row("SELECT * FROM camper_train_seatno WHERE cts_ctg_id='$id' AND cts_p_id='$cd'");
/* 						$db->debug(); */
						if($available)
						{
							
						}
						else
						{
							$insert=$db->query("INSERT INTO camper_train_seatno VALUES('','$id','','$cd','','')");
						}
					}
					
					foreach($EXISTING_ARRAY as $ea)
					{
						if(in_array($ea, $css_is))
					{
						
					}
					else
					{
						$delete=$db->query("DELETE FROM camper_train_seatno WHERE cts_ctg_id='$id' AND cts_p_id='$ea'");
					}
					}
					
					}
				}
				global $msg;
				
				$msg='Successfully created group.';
			}
			
}


if(isset($_POST['saveTrainSeat']))
{
$seat_no= $_POST['seat_no'];
$boggie_no= $_POST['boggie_no'];
if(is_array($seat_no))
{
foreach($seat_no as $key=>$value)
{
//echo 'key'.$key.' value'.$value.'<br />';
$camper_train_seatno= $db->query("UPDATE camper_train_seatno SET cts_seatno='$value' WHERE cts_id='$key'");
}
}
if(is_array($boggie_no))
{
foreach($boggie_no as $key=>$value)
{
//echo 'key'.$key.' value'.$value.'<br />';
$camper_train_seatno= $db->query("UPDATE camper_train_seatno SET cts_boggieno='$value' WHERE cts_id='$key'");
}
}
global $msg1;
	$msg1='Successfully updated seat no and boggie no.';

}


?>
