<?php

/* $test=$db->get_results("SELECT * FROM participant_batch WHERE pb_b_id='$_GET['bid']'"); */

$test=$db->get_results("SELECT * FROM participant LEFT JOIN participant_batch ON participant.p_id=participant_batch.pb_p_id WHERE participant_batch.pb_b_id='$_GET[bid]'");
/* $db->debug(); */

?>
<form name="form1" method="post" action="" id="myform" enctype="multipart/form-data">
<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Create Tickets</h3>
                </div><!-- /.box-header -->
     <div class="box-body">
<?php
if(isset($message))
{
?>
<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> <?php echo $message;?>
                </div>
<?php
}

if(isset($_GET['ctg_id']))
{
	$edit1=$db->get_row("SELECT * FROM camper_train_group WHERE ctg_id='$_GET[ctg_id]'");
/* 	$db->debug(); */
}


$group_camper1= $db->get_results("SELECT * FROM group_camper WHERE g_b_id='$_GET[bid]' GROUP BY g_crg_id");
if($group_camper1)
{
$no=0;
$colorcode=array('rgb(90, 131, 110)','rgb(116, 213, 162)','rgb(161, 221, 132)','rgb(224, 141, 157)','rgb(165, 117, 28)','#686868');
$groupColor[]=array();
foreach($group_camper1 as $gm)
{
	$colorcode1=$colorcode[$no];
	$groupColor[$gm->g_crg_id]=$colorcode1;
	$no+=1;
		if($no==5)
	{
		$no=0;
	}
/*
?>
<style>
.<?php echo $gm->g_crg_id;?>_group{
	float:left;
	background-color:blue;
}
</style>
<?php
*/
}
}
?>


<div class="form-group">
<label>Select Camper </label><br />

<select name='css_id[]' multiple="" class="form-control" data-rel="chosen" id="selectgroup">
<?php
$group_camper=$db->get_results("SELECT * FROM participant LEFT JOIN group_camper ON participant.p_id=group_camper.g_p_id WHERE group_camper.g_b_id='$_GET[bid]' ORDER BY group_camper.g_crg_id ASC");
$db->debug();

if($group_camper)
{
	foreach($group_camper as $test1)
	{
			
	$disp=$db->get_results("SELECT * FROM camper_train_group WHERE ct_id='' && rowstatus!='0'");
	$no=0;
if($disp)
{
	foreach($disp as $disp)
	{
		$chk=$db->get_row("SELECT * from camper_train_seatno WHERE cts_ctg_id='$disp->ctg_id' && cts_p_id='$test1->p_id'");
/* 		$db->debug(); */
		if($chk)
		{
			$no=1;
		}
	
	}
}
if($no==0)
{
$color=$groupColor[$test1->g_crg_id];
if(isset($_GET['ctg_id']))
{
		$chk=$db->get_row("SELECT * from camper_train_seatno WHERE cts_ctg_id='$_GET[ctg_id]' && cts_p_id='$test1->p_id'");
/* 		$db->debug(); */
		if($chk)
		{
			?>

	         <option value="<?php echo $test1->p_id;?>" style="background: <?php echo $color;?>; color: #FFF;" selected data-hidden="true"> <?php echo $test1->p_fname.' '.$test1->p_lname.' - '.$test1->g_crg_id;?></option>
	
	<?php	
		}
		else
		{
				?>

	         <option value="<?php echo $test1->p_id;?>" style="background: <?php echo $color;?>; color: #FFF;"  data-hidden="true"> <?php echo $test1->p_fname.' '.$test1->p_lname.' - '.$test1->g_crg_id;?></option>
	
	<?php	
		}
}
else
{
	?>

	         <option value="<?php echo $test1->p_id;?>" style="background: <?php echo $color;?>; color: #FFF;"  data-hidden="true"> <?php echo $test1->p_fname.' '.$test1->p_lname.' - '.$test1->g_crg_id;?></option>
	
	<?php	
	}
}
	}
	?>
	<?php
}
if($test)
{
	foreach($test as $test1)
	{
	$disp=$db->get_results("SELECT * FROM camper_train_group WHERE ct_id='' && rowstatus!='0'");
	$no=0;
if($disp)
{
	foreach($disp as $disp)
	{
		$chk=$db->get_row("SELECT * from camper_train_seatno WHERE cts_ctg_id='$disp->ctg_id' && cts_p_id='$test1->p_id'");
/* 		$db->debug(); */
		if($chk)
		{
			$no=1;
		}
	
	}
}
if($no==0)
{

$group_camper1=$db->get_results("SELECT * FROM participant LEFT JOIN group_camper ON participant.p_id=group_camper.g_p_id WHERE group_camper.g_b_id='$_GET[bid]' AND group_camper.g_p_id='$test1->p_id' ORDER BY group_camper.g_crg_id ASC");
if($group_camper1==false)
{
	if(isset($_GET['ctg_id']))
	{
		
			$chk=$db->get_row("SELECT * from camper_train_seatno WHERE cts_ctg_id='$_GET[ctg_id]' && cts_p_id='$test1->p_id'");
/* 		$db->debug(); */
		if($chk)
		{
			?>

	         <option value="<?php echo $test1->p_id;?>" style="background: <?php echo $color;?>; color: #FFF;" selected data-hidden="true"> <?php echo $test1->p_fname.' '.$test1->p_lname;?></option>
	
	<?php	
		}
		else
		{
				?>

	         <option value="<?php echo $test1->p_id;?>" style="background: <?php echo $color;?>; color: #FFF;"  data-hidden="true"> <?php echo $test1->p_fname.' '.$test1->p_lname;?></option>
	
	<?php	
		}
		
	}
	else
	{

	?>

	         <option value="<?php echo $test1->p_id;?>"  > <?php echo $test1->p_fname.' '.$test1->p_lname;?></option>
	
	<?php	
	}
}
}
	}
	?>

	<?php

}
else
{
?>
	<span class='label label-warning'>Data Not available </span>	
	
<?php	
}
?>   
</select>

</div>  
<div class="form-group">
                      <label for="exampleInputEmail1">PNR No</label>
                      <input type="text" class="form-control" id="" placeholder="" name="ctg_pnr" value="<?php if(isset($_GET['ctg_id'])){ echo $edit1->ctg_pnr; } ?>">
</div>

<div class="form-group">
                      <label for="exampleInputEmail1">Ticket No</label>
                      <input type="text" class="form-control" id="" placeholder="" name="ctg_ticketno" value="<?php if(isset($_GET['ctg_id'])){ echo $edit1->ctg_ticketno; } ?>">
</div>



<div class="form-group">
                      <label for="exampleInputEmail1">Train Class</label>
                  
                      <?php 
                     
                      	$trainclass=$db->get_results("SELECT * FROM train_class");
                      	if($trainclass)
                      	{
                      	?>
                      	    <select name="ctg_tc_id" class="form-control">
                      	<?php
	                      	foreach($trainclass as $trainclass)
	                      	{
	                      		if(isset($_GET['ctg_id']))
	                      		{
							  		if($trainclass->tc_id==$edit1->ctg_tc_id)
							  		{
							  				                      	
							  		?>
							  			 <option value="<?php echo $trainclass->tc_id; ?>" selected><?php echo $trainclass->tc_class; ?></option>
							  		 <?php
							  		}
							  			 else
							  			 {
								  			?> 
								  			 	<option value="<?php echo $trainclass->tc_id; ?>"><?php echo $trainclass->tc_class; ?></option>
								  			<?php

							  			 }
							  		}
							  		 else
							  			 {
								  			?> 
								  			 	<option value="<?php echo $trainclass->tc_id; ?>"><?php echo $trainclass->tc_class; ?></option>
								  			<?php

							  			 }

						  		?>
		                      	<?php
	                      	}
	                      	?>
                      </select>
	                      	<?php
                      	}
                      	else
                      	{
	                      	?>
	                      	<span class="label label-warning"> Data not available </span>
	                      	<?php
                      	}
                      
                      ?>
</div>
<label for="exampleInputEmail1">Status</label>

<?php
$res=$db->get_results("SELECT * FROM status");
if($res)
{?>
<select name="rowstatus" class="form-control">
<option value="000">Select</option>
<?php foreach($res as $res)
	{
	if(isset($_GET['id']))
{
if($test->rowstatus==$res->status_id)
{
?>
<option value="<?php echo $res->status_id; ?>" selected><?php echo $res->status_type; ?> </option>
<?php
}
else
{
?>
<option value="<?php echo $res->status_id; ?>"><?php echo $res->status_type; ?> </option>
<?php
}
}
else
{
?>
<option value="<?php echo $res->status_id; ?>"><?php echo $res->status_type; ?> </option>
<?php
}
 }
?>
</select><?php
}
else
{
	echo "Data Not Available";
}
?>
<input type="hidden" name='ctg_b_id' value='<?php echo $_GET['bid'];?>'>

<input type="hidden" name='userid' value='<?php echo $_SESSION['u_id'];?>'>
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
<?php
if(isset($_GET['ctg_id']))
{
?>
 <a href='?folder=trains&file=create_ticket&bid=<?php echo $_GET['bid']; ?>' class='btn btn-success'><i class="fa fa-fw fa-train"></i>Create New Ticket</a>
<?php
}

?>
     </div>
	</div>
</div>
<!-- Onward view -->
<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                              <h3 class="box-title"><i class="fa fa-fw fa-train"></i>Onward<!-- <a href='?folder=trains&file=create_ticket&bid=<?php echo $_GET['bid']; ?>' data-toggle="tooltip" title="Create New Tickets" class='btn btn-primary'style="float:right;"><i class="fa fa-fw fa-ticket"></i>Create Ticket </a> --></h3>
                </div><!-- /.box-header -->
     <div class="box-body">
       <?php
    echo camp_rel_trains1('onward');
	     
	?>
     
     </div>
	</div>
</div>




<!-- Return View -->

<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-fw fa-train"></i>Return</h3>
                </div><!-- /.box-header -->
     <div class="box-body">
     <?php
         echo camp_rel_trains1('return');
     ?>
     </div>
	</div>
</div>

</form>

