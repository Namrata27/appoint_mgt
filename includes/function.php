<?php
function clickfordialog($table,$column,$id,$icon=null)
{
?>
	    <a href="#myModal<?php echo $id;?>" role="button" <?php if($icon==null) { ?> class="btn btn-primary" <?php } ?> data-toggle="modal"><?php if($icon==null) { ?> <i class="glyphicon glyphicon-trash"></i><?php }else{ echo $icon;} ?> </a>
	  <!--  <a href="#myModal<?php echo $id;?>" role="button" class="btn" data-toggle="modal">Launch demo modal</a> -->
	    
	    
    <div class="modal fade" id="myModal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Delete</h3>
                </div>
                <div class="modal-body">
                    <p>Are u sure u want to delete...!!</p>
                </div>
                <div class="modal-footer">
                 <a href="delete.php?tablename=<?php echo $table;?>&colname=<?php echo $column;?>&id=<?php echo $id;?>" class="btn btn-primary">Yes</a>
                    <a href="#" class="btn btn-default" data-dismiss="modal">No</a>
                </div>
            </div>
        </div>
    </div>
  <?php
  }
  
  function Display_train_tickets($type)
  {
	  
	  global $db;
	  
	  $camper_trains= $db->get_results("SELECT * FROM camper_trains WHERE (ct_b_id='$_GET[bid]' AND ct_type='$type') && rowstatus!='0'");
	  /*$db->debug();*/
	  if($camper_trains)
	  {
		  foreach($camper_trains as $train)
		  {
			  
			  	  	  ?>
	  <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-fw fa-train"></i><?php echo $train->ct_title.' || '.$train->ct_date.' || '.$train->ct_campertrainno;?>
               
                  </h3>
                  <div class="box-tools pull-right">
                     <a href='index.php?folder=trains&file=create_ticket&bid=<?php echo $_GET['bid'];?>' class='btn btn-primary'><i class="fa fa-list"></i>Create Ticket</a>
                    <button class="btn btn-box-tool" data-widget="remove">&nbsp;<i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
           
           
           <?php
           
           $camper_train_group= $db->get_results("SELECT * FROM camper_train_group WHERE ct_id='$train->ct_id'");
           
           if($camper_train_group)
           {
           $no=0;
	           foreach($camper_train_group as $camper)
	           {
		           $no+=1;
		           group_detail1($camper->ctg_id,$no);
	           }
           }
           else
           {
	           
	           ?>
	             <div class='alert alert-danger'>
		  Group Not Created.
		  </div>
	           <?php
           }
           ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
	  <?php
		  }
		  
	  }
	  else
	  {
		  
		  ?>
		  <div class='alert alert-danger'>
		  Train not available.
		  </div>
		  <?php
	  }

  }
  
  function part1_reg()
  {
	  global $db;
	  ?>
	  
<div class="form-group">
<label for="exampleInputEmail1">Email 1</label><INPUT type="text" name="email1" class="form-control"/>
<div id='myform_email1_errorloc' class='label label-warning'></div>
 </div>

<div class="form-group">
	<label for="exampleInputEmail1">Email 2</label><INPUT type="text" name="email2" class="form-control"/>
	<div id='myform_email2_errorloc' class='label label-warning'></div>
 </div>
 
 
 <div class="form-group">
	<label for="exampleInputEmail1">Email 3</label><INPUT type="text" name="email3" class="form-control"/>
	<div id='myform_email3_errorloc' class='label label-warning'></div>
 </div>

 
<div class="form-group">
	<label for="exampleInputEmail1">Phone No</label><INPUT type="text" name="phoneno" class="form-control"/>
	<div id='myform_phoneno_errorloc' class='label label-warning'></div>
</div>
 
 
<div class="form-group">
<label for="exampleInputEmail1">Phone Self</label><INPUT type="text" name="phns" id="" class="form-control"/>
<div id='myform_phns_errorloc' class='label label-warning'></div>
<div>

<div class="form-group">
<label for="exampleInputEmail1">Phone (Father)</label><INPUT type="text" name="phnf" id="" class="form-control"/>
<div id='myform_phnf_errorloc' class='label label-warning'></div>
<div>

<div class="form-group">
<label for="exampleInputEmail1">Phone Mother</label><input type="text" name="phnm" class="form-control"/>
<div id='myform_phnm_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Phone (Other)</label><input type="text" name="phno" class="form-control"/>	
<div id='myform_phno_errorloc' class='label label-warning'></div>
</div>



<div class="form-group">
                      <label>Medical history</label>
                      <textarea class="form-control" rows="3" name="medhis"></textarea>
                      <div id='myform_medhis_errorloc' class='label label-warning'></div>
 </div>

<div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" rows="3" name="notes"></textarea>
                      <div id='myform_medhis_errorloc' class='label label-warning'></div>
 </div>

<div class="form-group">

<label for="exampleInputEmail1">Create Group </label>

<select name="group" class="form-control" id="group">

	<option value="1">No Group </option>
	<option value="2">Create Group </option>
	<option value="3">Select  group </option>
</select>
</div>



<div class="form-group">
<?php
$pstatus=$db->get_results("SELECT * from participant_status");
?>
				<label for="exampleInputEmail1">Participant Status</label>
					<select name="participantstatus" class="form-control">
						<?php
							if($pstatus)
								{
											foreach($pstatus as $pstatus)
											{
											?>
											<option value="<?php echo $pstatus->ps_id; ?>"><?php echo $pstatus->ps_title; ?> </option>
											<?php }
											?>
											</select>
											<?php
												}else
												{
													echo "<span class='label label-dandanger'>Data Not available</span>";
												}
												?>
												</div>
	  <?php
  }
  
  
  
  
  function registrationform()
  {
 	global  $message;
 	global $db;
	  ?>
	  
	  
   
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
 ?>
<div class="form-group">
 	<label for="exampleInputEmail1">First Name</label> <INPUT type="text" name="fname" class="form-control">
	  <div id='myform_fname_errorloc' class='label label-warning'></div>

</div>


<div class="form-group">
 	<label for="exampleInputEmail1">Middle Name</label><INPUT type="text" name="mname" class="form-control"/>
	<div id='myform_mname_errorloc' class='label label-warning'></div>
</div>



<div class="form-group">
	 <label for="exampleInputEmail1">Last Name</label><INPUT type="text" name="lname" class="form-control"/>
	 	<div id='myform_lname_errorloc' class='label label-warning'></div>
 </div>
 
<div class="form-group">
	 <label for="exampleInputEmail1">User Name</label><INPUT type="text" name="username" class="form-control"/>
	 	<div id='myform_lname_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
	 <label for="exampleInputEmail1">Password</label><INPUT type="password" name="userpassword" class="form-control"/>
	 	<div id='myform_lname_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
<?php 
$usertype=$db->get_results("SELECT * FROM user_type");
?>
<label for="exampleInputEmail1">User Type</label>
<select name="usertype" class="form-control">
<!-- <option value="000">Select </option> -->
<?php
if($usertype)
{
 foreach($usertype as $usertype)
	{
	?>
<option value="<?php echo $usertype->ut_id; ?>"><?php echo $usertype->ut_name; ?> </option>
<?php }
}
else
{
	echo '<span class="label label-danger">Data Not available<span>';
}
?>
</select>
</div>
 
<div class="form-group">
<label for="exampleInputEmail1">Birth Date</label><INPUT type="text" name="bd" id="datepicker" onchange='generateCat();' class="form-control"/>
<div id='myform_bd_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Gender</label><INPUT type="radio" name="gender" id=""  checked value="Male" > Male</INPUT>
<INPUT type="radio" name="gender" id="" value="Female" >Female</INPUT>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Blood Group</label><INPUT type="text" name="bldgrp" id="" class="form-control"/>
<div id='myform_bldgrp_errorloc' class='label label-warning'></div>
</div>



<div class="form-group">
<label for="exampleInputEmail1">Id Card </label><INPUT type="text" name="idcard" id="" class="form-control"/>
<div id='myform_idcard_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
<?php
	$getcat=$db->get_results("SELECT * FROM idcardtype");
?>
<label for="exampleInputEmail1">Id Card Type</label>
<select name="s1" class="form-control">
<option value="000">Select </option>
<?php
if($getcat)
{
 foreach($getcat as $cat)
	{
	?>
<option value="<?php echo $cat->idcardtype_id; ?>"><?php echo $cat->idcardtype_title; ?> </option>
<?php
 }

 }
 else
{
	echo "<span class='label label-danger'>Data Not available</span>";
}
?>
</select>
</div>

<div class="form-group">
<?php
$tshirtsize=$db->get_results("SELECT * FROM tshirt");
?>
<label for="exampleInputEmail1">T-Shirt Size</label>
<select name="size" class="form-control">
<option value="000">Select </option>
<?php
if($tshirtsize)
{
 foreach($tshirtsize as $tshirtsize)
	{
	?>
<option value="<?php echo $tshirtsize->tshirt_id; ?>"><?php echo $tshirtsize->tshirt_title; ?> </option>
<?php 
}
 }else
{
	echo "<span class='label label-important'>Data Not available</span>";
}
?>
</select>
</div>


<script>
 $("#group").change(function(){
var selectedgroup = $("#group").find(":selected").val();

if(selectedgroup==2)
{

	$("#group_camperList").hide();


}
if(selectedgroup==1)
{

	$("#group_camperList").hide();


}


else if(selectedgroup == 3){
	//alert('group id is '+selectedgroup);

	$("#group_camperList").show();
	
	
}

});

</script>

<div class="form-group" id='group_camperList' style="display:none;">
<label for="exampleInputEmail1">Select Group</label>

<select name="group_camper" class="form-control" id="group">
<option value='000'>Select Group</option>
<?php
$group_camper= $db->get_results("SELECT * FROM camper_rel_group WHERE crg_b_id='$_GET[bid]'");
if($group_camper)
{

?>


<?php
 foreach($group_camper as $cat)
	{
	?>
	
	<option value="<?php echo $cat->crg_id; ?>"><?php echo $cat->crg_name; ?> </option>
	
<?php }
?>


<?php
 }
 else
{
	echo "<span class='label label-danger'>Data Not avilable</span>";
	}
?>
</select>
</div>
<!--  <div class="">&nbsp;</div> -->
 
 <div class='replySec' style='display:none;'>
 
 <div class="alert alert-success"  id='successCamper'  style='display:none;'>
 <strong>Success!</strong> You are applicable to this camp.
</div>
<div class="alert alert-danger" id='errorCamper'  style='display:none;'>
	<strong>Error!</strong> You are not applicable to this camp.
</div>
 
 </div>
 <?php
 
 $result=$db->get_results("SELECT * FROM tour");
 
 ?>
  <div id='responseData'>
</div>
               

  <INPUT type="submit" id='submit_add' class="btn btn-default" name="addparticipant" value="SUBMIT">

  </INPUT>
  
	  <?php

  }
  
  
  
  
function registerationform_edit()
{

	global $message;
	global $db;
$bid=$_GET['bid'];

$batch=$db->get_row("SELECT * FROM Batch WHERE b_id='$bid'");
if($batch)
{
$tourid=$batch->b_tour_id;

//echo $tourid;
}
$id=$_GET['pid'];

$query1=$db->get_row("select * from participant where p_id='$id'");

$pstatus=$db->get_results("SELECT * FROM participant_status");


if(isset($message))
{
?>
<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> <?php echo $message;?>
                </div>
<?php
}
 ?>
 							<div class="form-group">
								<label for="exampleInputEmail1">First Name</label><input type="text" value="<?php echo $query1->p_fname;?>" name="fname" class="form-control" />
								<div id='myform_fname_errorloc' class='label label-warning'></div>
								
							</div>
							
							
							<div class="form-group">
								<label for="exampleInputEmail1">Middle Name</label><input type="text" value="<?php echo $query1->p_mname;?>" name="mname" class="form-control" />
								<div id='myform_mname_errorloc' class='label label-warning'></div>
							</div>
							
													
							<div class="form-group">
								<label for="exampleInputEmail1">Last Name</label><input type="text" value="<?php echo $query1->p_lname;?>" name="lname" class="form-control"/>
								<div id='myform_lname_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">
	 <label for="exampleInputEmail1">User Name</label><INPUT type="text" name="username" class="form-control" value="<?php echo $query1->p_username; ?>">
	 	<div id='myform_lname_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
	 <label for="exampleInputEmail1">Password</label><INPUT type="password" name="userpassword" class="form-control" value="<?php echo $query1->p_upassword; ?>">
	 	<div id='myform_lname_errorloc' class='label label-warning'></div>
</div>

<div class="form-group">
<label for="exampleInputEmail1">User Type</label>
<?php 
$usertype=$db->get_results("SELECT * FROM user_type");
 ?>
<select name="usertype" class="form-control">
<option value="000">Select </option>
<?php
if($usertype)
{

 foreach($usertype as $usertype)
	{
		$ut=$query1->p_usertype;
									if($ut == $usertype->ut_id)
									{
										$selected = 'selected';	
									} 
									else
									{
										$selected = '';	
									}
									?>

<option <?php echo $selected; ?> value="<?php echo $usertype->ut_id; ?>"><?php echo $usertype->ut_name; ?> </option>
<?php }
?>
</select>
<?php
 }else
{
	echo '<span class="label label-danger">Data Not available<span>';
}
?>
</div>
							
								<div class="form-group">
						   <label for="exampleInputEmail1">Birth Date</label><input type="text" onchange='generateCat();' value="<?php echo $query1->p_bd;?>" name="bd" size="30" id="datepicker" class="form-control"/>
							<div id='myform_bd_errorloc' class='label label-warning'></div>
							</div>
							
								<div class="form-group">
							<label for="exampleInputEmail1">Gender</label>
							<?php
							if($query1->p_gender=='')
							{
							?>
							
							<input type="radio" value="Male" name="gen" class="form-conrtol"/>Male
							
							<input type="radio" value="Female" name="gen" class="form-conrtol"/>Female
							<?php
							}
							elseif($query1->p_gender=='Male')
							{
							?>
							<input type="radio" checked value="Male" name="gen" class="form-conrtol"/>Male
							
							<input type="radio" value="Female" name="gen" class="form-conrtol"/>Female
							<?php
							
							}
							elseif($query1->p_gender=='Female')
							{
							?>
							<input type="radio" value="Male" name="gen" class="form-conrtol" />Male
							
							<input type="radio" checked value="Female" name="gen" class="form-conrtol" />Female
							<?php
							
							}
							else
							{
								
							}
							?>
							</div>		
							
								<div class="form-group">
								<label for="exampleInputEmail1">Blood Group</label><input type="text" value="<?php echo $query1->p_bldgrp;?>" name="bldgrp" class="form-control"/>
							<div id='myform_bldgrp_errorloc' class='label label-warning'></div>
							</div>
							
														
							<div class="form-group">
							<label for="exampleInputEmail1">Id Card</label><input type="text" value="<?php echo $query1->p_idcard;?>" name="idcard" class="form-control"/>
							</div>

							<div class="form-group">
							<label for="exampleInputEmail1">Id Card Type Name</label>
							
								<?php 
								$query2=$db->get_results("SELECT * FROM idcardtype");?>
								
								<select name="s1" class="form-control">
								<?php 
									/* $categoryname=$query1->c_title;	 */
													
								foreach($query2 as  $query2)
								{ 
									/* $name = $query1; */
									$name=$query1->p_idcardtype_id;
									if($name == $query2->idcardtype_id)
									{
										$selected = 'selected';	
									} 
									else
										{
											$selected = '';	
										}
											?>
											<option <?php echo $selected; ?> value="<?php echo $query2->idcardtype_id; ?>"> <?php echo $query2->idcardtype_title; ?> </option>
											<?php 
								}
								?>
								</select>
							</div>
							<div class="form-group">
							<label for="exampleInputEmail1">T-Shirt Size</label>
							
								<?php 
								$query2=$db->get_results("SELECT * FROM tshirt");?>
								
								<select name="size" class="form-control">
								<?php 
									/* $categoryname=$query1->c_title;	 */
													
								foreach($query2 as  $query2)
								{ 
									/* $name = $query1; */
									$name=$query1->p_tshirtsize;
									if($name == $query2->tshirt_id)
									{
										$selected = 'selected';	
									} 
									else
										{
											$selected = '';	
										}
											?>
											<option <?php echo $selected; ?> value="<?php echo $query2->tshirt_id; ?>"> <?php echo $query2->tshirt_title; ?> </option>
											<?php 
								}
								?>
								</select>
							</div>
													
						<script>
 $("#group").change(function(){
var selectedgroup = $("#group").find(":selected").val();

if(selectedgroup==2)
{

	$("#group_camperList").hide();


}
else if(selectedgroup==1)
{

	$("#group_camperList").hide();


}
else if(selectedgroup == 3){
	//alert('group id is '+selectedgroup);

	$("#group_camperList").show();
	
	
}

});

</script>

<div class="form-group" id='group_camperList' style="display:none;">
<?php
$group_camper= $db->get_results("SELECT * FROM camper_rel_group WHERE crg_b_id='$_GET[bid]'");
/* $db->debug(); */
//print_r($group_camper);
if($group_camper)
{

?>

<label for="exampleInputEmail1">Select Group</label>

<select name="group_camper" class="form-control" id="group">
<option value='000'>Select Group</option>
<?php
 foreach($group_camper as $cat)
	{
	?>
	
	<option value="<?php echo $cat->crg_id; ?>"><?php echo $cat->crg_name; ?> </option>
	
<?php }
?>
</select>

<?php
 }
 else
{
	echo '<span class="label label-important">data Not available</span>';	
	}
?>
</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Participant Status</label>
								<select name="participantstatus" class="form-control">
									<?php
										if($pstatus)
										{
											foreach($pstatus as $pstatus)
											{
											?>
											<option value="<?php echo $pstatus->ps_id; ?>"><?php echo $pstatus->ps_title; ?> </option>
											<?php }
											?>
											</select>
											<?php
												}else
												{
													echo "<span class='label label-dandanger'>Data Not available</span>";
												}
												?>
												</div>
												
							 <div class='replySec' style='display:none;'>
 
 <div class="alert alert-success"  id='successCamper'  style='display:none;'>
 <strong>Success!</strong> You are applicable to this camp.
</div>
<div class="alert alert-danger" id='errorCamper'  style='display:none;'>
	<strong>Error!</strong> You are not applicable to this camp.
</div>
 
 </div>
 
 
							<div class="form-group">					   
									<INPUT type="submit"  id='submit_add' name="participant_edit" value="Update" class="btn btn-primary"/>
							</div>


<?php
}  
  
  
  
  function part1_regedit()
  {
  
  	global $db;
  	
  
  		$bid=$_GET['bid'];

$batch=$db->get_row("SELECT * FROM Batch WHERE b_id='$bid'");
if($batch)
{
$tourid=$batch->b_tour_id;

//echo $tourid;
}
$id=$_GET['pid'];

$query1=$db->get_row("select * from participant where p_id='$id'");

$pstatus=$db->get_results("SELECT * FROM participant_status");

  
  
  
  
 	 ?>
  
 	 						<div class="form-group">
							<label for="exampleInputEmail1">E-mail</label><input type="text" value="<?php echo $query1->p_email1;?>" name="email1" class="form-control"/>
							<div id='myform_email1_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">E-mail2</label><input type="text" value="<?php echo $query1->p_email2;?>" name="email2" class="form-control"/>
							<div id='myform_email2_errorloc' class='label label-warning'></div>
							<div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">E-mail3</label><input type="text" value="<?php echo $query1->p_email3;?>" name="email3" class="form-control"/>
							<div id='myform_email3_errorloc' class='label label-warning'></div>
							<div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Phone No</label><input type="text" value="<?php echo $query1->p_phone;?>" name="phoneno" class="form-control"/>
							<div id='myform_phoneno_errorloc' class='label label-warning'></div>
							<div>
												
							<div class="form-group">
							<label for="exampleInputEmail1">Phone Father</label><input type="text" value="<?php echo $query1->p_phn_f;?>" name="phnf" class="form-control"/>
							<div id='myform_phnf_errorloc' class='label label-warning'></div>
							<div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Phone Mother</label><input type="text" value="<?php echo $query1->p_phn_m;?>" name="phnm" class="form-control"/>
							<div id='myform_phnm_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Phone Self</label><input type="text" value="<?php echo $query1->p_phn_s;?>" name="phns" class="form-control"/>
							<div id='myform_phns_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Phone Other</label><input type="text" value="<?php echo $query1->p_phn_o;?>" name="phno" class="form-control"/>
							<div id='myform_phno_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">				
							<label for="exampleInputEmail1">Medical History</label><input type="text" value="<?php echo $query1->p_medhistory;?>" name="medhis" class="form-control"/>
							<div id='myform_medhis_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">							
								<label for="exampleInputEmail1">Notes</label><input type="text" value="<?php echo $query1->p_notes;?>" name="notes" class="form-control"/>
								<div id='myform_notes_errorloc' class='label label-warning'></div>
							</div>
							
							<div class="form-group">
							<label for="exampleInputEmail1">Create Group </label>
							<select name="group" class="form-control" id="group">
								<option value="1">No Group </option>
								<option value="2">Create Group </option>
								<option value="3">Select  group </option>
								</select>

								</div>

	
	<?php	  
  }
  
  
  
  function group_detail($ctg_id,$no)
  {
	  global $db;
	  ?>
<div class="col-md-3">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo  'Group No '.$no;?></h3>
                  <div class="box-tools pull-right">
                  <a href="?folder=trains&file=create_ticket&bid=<?php echo $_GET['bid'];?>&ctg_id=<?php echo $ctg_id; ?>" Title="Edit Ticket " class=""><i class="glyphicon glyphicon-pencil"></i></a>

                  
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                
                
              <?php
              $ticketdetails=$db->get_row("SELECT * FROM camper_train_group WHERE ctg_id='$ctg_id'");
              if($ticketdetails)
              {
              		
              		$trainclass=$db->get_row("SELECT * FROM train_class WHERE tc_id='$ticketdetails->ctg_tc_id' ");
              		if($trainclass)	
              		{
	              		$tc=$trainclass->tc_class;
              		}
              		?>
              		<div class='train_class'>
              		
	           <label> Ticket No : </label> <?php echo $ticketdetails->ctg_ticketno;?><br />
	             <label>PNR No : </label> <?php echo $ticketdetails->ctg_pnr; ?><br />
	             <label> Class : </label> <?php if(isset($tc)){ echo $tc;} ?></b><br />
	            
	            </div>
	            <?php  
              }
	$participant=$db->get_results("SELECT * FROM participant LEFT JOIN camper_train_seatno ON participant.p_id=camper_train_seatno.cts_p_id WHERE camper_train_seatno.cts_ctg_id='$ctg_id'");
			if($participant)
			{
				foreach($participant as $camper)
				{
					
						$icon='<i class="glyphicon glyphicon-remove-circle"></i>';
			?>
			<div class="col-md-12"><?php echo $camper->p_fname.' '.$camper->p_lname; ?>
			
			
			<div style='float:right;'>
			
			<?php 
			clickfordialog('camper_train_seatno','cts_id',$camper->cts_id,$icon);?>
			</div>
			</div>
			<?php
				}
			}
		?><br>
                      </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
              
	  <?php
  }
  function Form_insert($type,$seo_table=null)
{
global $db;
//print_r($_POST);
$query = 'INSERT INTO '.$type.' (';
foreach($_POST as $key=>$value){
if($key!='submit' && $key!='SaveAndCont'  && $key!='couponID' && $key!='saveandclose' && $key!='image' && $key!='co_tfee_lock' && $key!='paypal_cur_lock' && $key!='table' && $key!='type' && $key!='type_id' && $key!='seo_table' && $key!='userid' && $key!='sd_t' && $key!='sd_mt' && $key!='sd_mk' && $key!='sd_md' && $key!='css_id' && $key!='redirection_t'  && $key!='publishdata')
{
$query .=  $key.',';
 } }
 $query1= substr($query,0,-1);
 //echo 'query1 :='.$query1.'<br />';
 //$query.=$query1;
$query .= ') VALUES (';
$query2=$query1.')VALUES(';
//echo 'query: ='.$query.'<br />';
foreach($_POST as $key=>$value){
//$value=mysql_escape_string($value);
//echo 'key :'.$key.' Value :'.$value.'<br />';
if($key!='submit' && $key!='SaveAndCont'  && $key!='couponID' && $key!='saveandclose' && $key!='image' && $key!='co_tfee_lock' && $key!='paypal_cur_lock' && $key!='table' && $key!='type' && $key!='type_id' && $key!='seo_table' && $key!='userid' && $key!='sd_t' && $key!='sd_mt' && $key!='sd_mk' && $key!='sd_md' && $key!='css_id' && $key!='redirection_t'  && $key!='publishdata'){
if(is_array($value)){
//echo 'key :'.$key.'Array Value :'.$value.'<br />';
//print_r($value);
	 $newarray = '';
	foreach($value as $array1=>$arrayvalue){
	//$array .= $arrayvalue.',';
	$newvalue =$arrayvalue.',';
	$newarray .= $newvalue;
	}
	$array = rtrim($newarray,',');
	//print_r($array);
	if(isset($array)){
	$value = String_replace($array);
		
	//$value = $array;
	}
	}
	$value= String_replace($value);
	$value= $value;
	//echo 'value :'.$value.'<br />';
$query2 .= "'$value',";}
}
$query2 .= ')';
//$a=rtrim($query,',');
//echo'query 222 ='. $query2;
$sql= substr($query2,0,-2);
$que=$sql.')';
//echo 'query 333'.$sql.'<br />';
@$result = $db->query($que);
//print_r($que);
$insert_id = $db->insert_id;

if($seo_table != '' && strlen($seo_table) > '0' && strlen($seo_table) != '0' && isset($seo_table) && $insert_id != '' && $insert_id > '0')
{
	//echo 'in if'.strlen($seo_table).'dsfsfsdf';
	$seoinsert= Seo_Form_insert($seo_table,$insert_id,$type,$_POST);
}else{
		//echo 'in else';
}

if($result)
{
//echo 'Insert ';
}
else
{
//echo 'Not insert';
}
//echo '<br />';
//print_r($que);
/*
$id = $db->get_row("SHOW FULL COLUMNS FROM $type");
$columns = $db->get_results("SHOW FULL COLUMNS FROM $type WHERE Field !='$id->Field'");
//print_r($columns);
$value='';
foreach($columns as $column)
{
if(is_array($_POST[$column->Field]))
{
//print_r($_POST[$column->Field]);
foreach($_POST[$column->Field] as $array)
{
$value[$column->Field].=$array.',';
}
}
else
{
//echo $_POST[$column->Field];
}
}
*/
//print_r($value);
return $insert_id;
}



function loadTrainForm($no,$type)
{
global $db;


$q=$db->get_results("SELECT * from participant");
?>

<!--<link rel="stylesheet" type="text/css" href="add.css"/>-->

<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->



<td><?php echo $no;?></td>

<td>

<INPUT type="text" name="<?php echo $type;?>[<?php echo $no;?>][title]" class="form-control">
</td>

<td>



<INPUT type="text" name="<?php echo $type;?>[<?php echo $no;?>][train_no]"  class="form-control">
	
</td>

<td>

<INPUT type="text" name="<?php echo $type;?>[<?php echo $no;?>][train_date]" id="datepicker1<?php echo $no;?>" class="form-control">
	
</td>





<?php
}




function loadBatchForm($no)
{
global $db;

$qry=$db->get_results("SELECT * FROM tour");
$q=$db->get_results("SELECT * from participant");
?>

<!--<link rel="stylesheet" type="text/css" href="add.css"/>-->

<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->



<td><?php echo $no;?></td>

<td>
<INPUT type="text" name="tour[<?php echo $no;?>][startdate]" id="datepicker<?php echo $no;?>" class="form-control">
</td>

<td>
<INPUT type="text" name="tour[<?php echo $no;?>][enddate]" id="datepicker1<?php echo $no;?>" class="form-control">
</td>

<td>
<INPUT type="text" name="tour[<?php echo $no;?>][camp_code]" class="form-control">
</td>

<td>
<INPUT type="text" name="tour[<?php echo $no;?>][limit]" class="form-control">
</td>

<td><INPUT type="text" name="tour[<?php echo $no;?>][batchfee]" id="batchfee" class="form-control">
	

</td>
<td><INPUT type="text" name="tour[<?php echo $no;?>][bookingamt]" id="bkamt" class="form-control">
</td>

<?php
}

function batchchartview()
{

	global $db;
	
	$bid=$_GET['bid'];
	
	$count=$db->get_var("SELECT count(*) FROM participant LEFT JOIN participant_batch ON participant.p_id=participant_batch.pb_p_id WHERE participant_batch.pb_b_id='$bid'");


	$registeredcamper=$count;
	
	$participant=$db->get_results("SELECT * FROM participant LEFT JOIN participant_batch ON participant.p_id=participant_batch.pb_p_id WHERE participant_batch.pb_b_id='$bid'");
	
	if($participant)
	{
		$male=0;
		$female=0;
		foreach($participant as $camper)
		{
			if($camper->p_gender=='Female')
			{
				$female+=1;
			}
			else
			{
				$male+=1;
			}
		}
		}
	
	$batchlimit=$db->get_row("SELECT * FROM Batch WHERE b_id='$bid'");
	

	
	$limit=$batchlimit->b_limit;
	
	$remainigseats = $limit - $count;
	
/*
echo "remainingseats".$remainigseats;
		echo "<br>limit".$limit;
			echo "<br>count".$count;
			echo "<br>Female".$female;
			echo "<br>male".$male;
*/
if($count!=0)
{
?>

<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script>

var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "path": "http://www.amcharts.com/lib/3/",
  "dataProvider": [ {   
   "Camp": "Remaining",
    "value": <?php echo $remainigseats;?>
  }, {
    "Camp": "Male",
    "value": <?php echo $male; ?>
  }, {
    "Camp": "Female",
    "value": <?php echo $female; ?>
  } ],
  "valueField": "value",
  "titleField": "Camp",
  "outlineAlpha": 0.4,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 30,
  "export": {
    "enabled": true
  }
} );
jQuery( '.chart-input' ).off().on( 'input change', function() {
  var property = jQuery( this ).data( 'property' );
  var target = chart;
  var value = Number( this.value );
  chart.startDuration = 0;

  if ( property == 'innerRadius' ) {
    value += "%";
  }

  target[ property ] = value;
  chart.validateNow();
} );
</script>

<div id="chartdiv"></div>
<style>
#chartdiv {
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
}											
</style>
<?php
}
else
{
	echo "<div class='alert alert-danger'>Data Not available</div>";
}
}


function Form_Update($type,$id,$seo_table=null)
{
	global $db;
/*	echo $type;

echo '<pre>';
print_r($_POST);	
echo '</pre>';*/
$userid=$_POST['userid'];
$column = $db->get_row("SHOW FULL COLUMNS FROM $type");
$last_value= $db->get_row("SELECT * FROM $type WHERE $column->Field='$id'");

$query = 'UPDATE '.$type.' SET ';

foreach($_POST as $key=>$value){
if($key!='submit' && $key!='SaveAndCont'  && $key!='couponID' && $key!='saveandclose' && $key!='table' && $key!='image' &&
$key!='seo_table' && $key!='co_tfee_lock' && $key!='paypal_cur_lock' && $key!='userid' && $key!='id' && $key!='sd_t' && $key!='sd_mt' && $key!='sd_mk' && $key!='sd_md'  && $key!='css_id' && $key!='redirection_t' && $key!='doc' && $key!='publishdata' )
{



if(is_array($value))
{
$newarray = '';
	foreach($value as $array1=>$arrayvalue){
	$newvalue =$arrayvalue.',';
	$newarray .= $newvalue;

	}
	//print_r($newarray);
	$array = rtrim($newarray,',');
//echo 'above array';
//print_r($array);
	if(isset($array)){


//print_r($newarray2);
//echo '<br />';
$value = $array;
//echo 'value is:'.$value;	
	
	$value=String_replace($value);
	$seotitle=String_replace($seotitle);
	}
	}
$value=String_replace($value);
if($last_value->$key == $value)
{
//echo 'value :'.$last_value->$key.'<br />';
}
else
{
$date=date('Y-m-d, H:i:s');
//echo 'not value :'.$key.$last_value->$key.'new value'.$value.'<br />';
$original_value=$last_value->$key;
$admin_count= $db->get_row("SELECT * FROM admin_change WHERE (type='$type' AND type_id='$id') AND(field_change='$key') ORDER BY ac_id DESC");
if($admin_count)
{
$change_count=$admin_count->change_count + 1;
}
else
{
$change_count='1';
}
//echo 'original value is:'.$original_value.'<br />';
//echo 'default value is:'.$value.'<br />';

$insert_admin= $db->query('INSERT INTO admin_change VALUES("","'.$type.'","'.$id.'","'.$key.'","'.$original_value.'","'.$value.'","'.$date.'","'.$userid.'","'.$change_count.'")');
}
$query .=  $key.'='."'".$value."',";


 } }
 
 $sql= substr($query,0,-1);
 //echo'sql :'. $sql.'<br />';
$query12=$sql.' WHERE '.$column->Field.'='."'$id'";
//echo 'perfect query'.$query;
$query1= $query12;
//echo 'query 1 : ='.$query1.'<br />';
//$a=rtrim($query,',');
//echo'query 222 ='. $query2;
//$sql= substr($query2,0,-2);
//$que=$sql.')';

//echo '$id is:'.$id;
//echo 'query 333'.$sql.'<br />';
@$update = $db->query($query1);
/* /$db->debug(); */
if($seo_table!='')
{
$table='seo_detail';
$seo=Seo_Form_Update($table,$id,$type);
}
if($update)
{
//echo 'update success ';
$update = '1';
return $update;

}
else
{
//echo 'Not update';
}
//  checking for update success. return value

}
function String_replace($variable)
{
	//male string
	
	//$doubleQuote = str_replace('"', "&quot;", $variable);
	$singleQuote = str_replace("'", "&#39;", $variable);
	return $singleQuote;
}
function Seo_Form_insert($table,$insertid,$type)
{
global $db;
//print_r($_POST);
uploadFile1($type,$insertid);
$query = 'INSERT INTO '.$table.' ( sd_ty,sd_ty_id,sd_t,';
$value1='';

$seo_t = '';

$seo_title=$_POST['sd_t'];    

$invalid = array('Å '=>'S', 'Å¡'=>'s', 'Ä�'=>'Dj', 'Ä�'=>'dj', 'Å½'=>'Z', 'Å¾'=>'z',
			'Ä�'=>'C', 'Ä�'=>'c', 'Ä�'=>'C', 'Ä�'=>'c', 'Ã�'=>'A', 'Ã�'=>'A', 'Ã�'=>'A', 'Ã�'=>'A',
			'Ã�'=>'A', 'Ã�'=>'A', 'Ã�'=>'A', 'Ã�'=>'C', 'Ã�'=>'E', 'Ã�'=>'E', 'Ã�'=>'E', 'Ã�'=>'E',
			'Ã�'=>'I', 'Ã�'=>'I', 'Ã�'=>'I', 'Ã�'=>'I', 'Ã�'=>'N', 'Ã�'=>'O', 'Ã�'=>'O', 'Ã�'=>'O',
			'Ã�'=>'O', 'Ã�'=>'O', 'Ã�'=>'O', 'Ã�'=>'U', 'Ã�'=>'U', 'Ã�'=>'U', 'Ã�'=>'U', 'Ã�'=>'Y',
			'Ã�'=>'B', 'Ã�'=>'Ss', 'Ã '=>'a', 'Ã¡'=>'a', 'Ã¢'=>'a', 'Ã£'=>'a', 'Ã¤'=>'a', 'Ã¥'=>'a',
			'Ã¦'=>'a', 'Ã§'=>'c', 'Ã¨'=>'e', 'Ã©'=>'e', 'Ãª'=>'e', 'Ã«'=>'e', 'Ã¬'=>'i', 'Ã­'=>'i',
			'Ã®'=>'i', 'Ã¯'=>'i', 'Ã°'=>'o', 'Ã±'=>'n', 'Ã²'=>'o', 'Ã³'=>'o', 'Ã´'=>'o', 'Ãµ'=>'o',
			'Ã¶'=>'o', 'Ã¸'=>'o', 'Ã¹'=>'u', 'Ãº'=>'u', 'Ã»'=>'u', 'Ã½'=>'y',  'Ã½'=>'y', 'Ã¾'=>'b',
			'Ã¿'=>'y', 'Å�'=>'R', 'Å�'=>'r', "`" => "'", "Â´" => "'", "â��" => ",", "`" => "'",
			"Â´" => "'", "â��" => "\"", "â��" => "\"", "Â´" => "'", "&acirc;â�¬â�¢" => "'", "{" => "",
			"~" => "", "â��" => "-", "â��" => "'"," " => "-");
			
	$seo_title = str_replace(array_keys($invalid), array_values($invalid), $seo_title);
		
	$seo_t = '';
//	$seo_title = $value;
//echo '$seo_title is:'.$seo_title;

	$searchspace=strpos($seo_title,' ');
	$searchspace1=strpos($seo_title,'_');
	if($searchspace || $searchspace1)
	{
		//echo 'In dsjklflskdhf';
		$seo_t= str_replace(' ', '-', $seo_title);
		$seo_t= str_replace('_', '-', $seo_t);
	}
	else
	{
		//echo 'dsfsfsdfds';
		$seo_t= $seo_title ;
	}

foreach($_POST as $key=>$value){
if($key =='sd_mt' || $key =='sd_mk' || $key =='sd_md' || $key =='css_id' || $key =='redirection_t' || $key =='doc')
{

$query .=  $key.',';
//echo 'Key : ='.$key.'<br />';

//$value1.=','.$value.',';
 }
 }
 
 $query1= substr($query,0,-1);
 
 //echo 'query1 :='.$query1.'<br />';
 //$query.=$query1;
 //echo'query : ='.$query;
//$query2=$query.')VALUES(';
//echo 'query 2: ='.$query2.'<br />';
foreach($_POST as $key=>$value){
if($key =='sd_mt' || $key =='sd_mk' || $key =='sd_md'  || $key =='css_id' || $key =='redirection_t' || $key =='doc')
{

$query .=  $key.',';
//echo 'Key : ='.$key.'<br />';

//$newvalue = String_replace($value);
if(is_array($value))
{
	$newarray = '';
	foreach($value as $array1=>$arrayvalue)
	{
		//$array .= $arrayvalue.',';
		$newvalue =$arrayvalue.',';
		$newarray.= $newvalue;
	}
	$array = rtrim($newarray,',');
	$value = $array;
}else{
	$value= $value;
}
$value1.="'$value',";
 }
 }
	// echo '$seo_ti is: '.$seo_t;
 
  $query_value= substr($value1,0,-1);
 //$query_value=String_replace($query_value);
   $types="'$type'".','."'$insertid'";
   $seotitle="'$seo_t'";
  // $seotitle=String_replace($seotitle);
  
  //echo 'Seo Title is:'.$seo_t;
  
$query11=$query1.') VALUES('.$types.','.$seotitle.','.$query_value.')';
//echo 'query 11'.$query11.'<br />';
//$query2 .= ')';
//$a=rtrim($query,',');
//echo'query 222 ='. $query2;
//$sql= substr($query2,0,-2);
//$que=$sql.')';
//echo 'query 333'.$sql.'<br />';

$css_id= $_POST['css_id'];

@$result=$db->query($query11);

$seo_id= $db->insert_id;

if(is_array($css_id))
{
$no1234='0';
foreach($css_id as $csid)
{
//echo'cssid'.$csid.'<br />';	
if($csid=='00')
{
$no1234='1';
}
}
if($no1234=='1')
{
//$a=CountrySwitcherArray1('country_switcher','css_id','css_id');
$update= $db->query("UPDATE $table SET css_id='$a' WHERE sd_ty='$type' AND sd_ty_id='$insertid'");
//$db->debug();
}
}

if($result)
{
//echo 'Insert  Seo ';
}
else
{
//echo 'Not insert seo';
}
//echo '<br />';

//image uploader

$type_id=$insertid;


if($type =='tour')
{
	$full_height = '300';
	$full_width = '800';	
	$image_height='140';
	$image_width='280';
}elseif($type == 'category')
{
	$full_height = '300';
	$full_width = '800';
	$image_height=	null;
	$image_width= null;
}elseif($type == 'destination'){
	
	$full_height = '300';
	$full_width = '800';
	$image_height=	'300';
	$image_width= '800';
	
}

else
{
	$full_height = null;
	$full_width = null;
	$image_height='150';
	$image_width='150';
}

}
function camp_rel_trains1($type)
{
global $db;

 $res=$db->get_results("SELECT * FROM camper_trains WHERE (ct_type='$type' && ct_b_id='$_GET[bid]') AND (rowstatus!='0')");
/*  $db->debug(); */
     
     if($res)
     {
	  	     	?>
	 
			<?php  
			foreach($res as $res1)
	        {
	        ?>
	        
	        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-fw fa-train"></i></span>
                <div class="info-box-content">
                
               
                  <input type="checkbox" name='available_trains[]' value="<?php echo $res1->ct_id; ?>">   
                             <b>            <?php echo $res1->ct_campertrainno;?></b> <br />                   
              <?php echo $res1->ct_title;?><br />
              <?php echo $res1->ct_date;?>
              
             
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>
	   
			<?php
			}
			?> 
		  
		   <?php  
			     }
	     else
	     {
		     
		     ?>
		     <div class='alert alert-danger'>Train Not Available.</div>
		     <?php
	     }
}

function camp_rel_trains($type)
{
global $db;

 $res=$db->get_results("SELECT * FROM camper_trains WHERE (ct_type='$type' && ct_b_id='$_GET[bid]') AND (rowstatus!='0')");
     
     if($res)
     {
	  	     	?>
	     	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
			<thead>
			<tr>
			<th>Train Title</th>
			<th>Train Type</th>
			<th>Train No</th>
			<th>Train date</th>
			<th>Train Status</th>
			<th>Options </th>
			</tr>
			</thead>
			<tbody>
			<?php  
			foreach($res as $res)
	        {
	        ?>
			<tr>
			<td width=""><?php echo $res->ct_title ?></td>
			
			<td width=""><?php echo $res->ct_type; ?></td>
			
			<td width=""><?php echo $res->ct_campertrainno; ?></td>
			
			<td width=""><?php echo $res->ct_date; ?></td>
				
				<td>
				<?php
				if($res->rowstatus=='1')
				{
					?>
					<span class='label label-success'>Publish</span>
					<?php
				}
				else
				{
					?>
					<span class='label label-danger'>Unpublish</span>
					<?php
				}
				?>
				</td>
			<td width="30%">
		<!-- 	<a href='?folder=trains&file=create_ticket&ct_id=<?php echo $res->ct_id;?>&bid=<?php echo $_GET['bid']; ?>' data-toggle="tooltip" title="Create New Tickets" class='btn btn-primary'><i class="fa fa-fw fa-ticket"></i></a> -->
		<a data-toggle="tooltip" title="Edit Tour" href="?folder=trains&file=add&id=<?php echo $res->ct_id;?>&bid=<?php echo $_GET['bid']; ?>" class='btn btn-primary'>
		 <i class="glyphicon glyphicon-edit">
		 </i>
		 </a>
		 
<!--
	<a data-toggle="tooltip" title="Delete Tour" href="delete.php?tablename=tour&colname=tour_id&id=<?php echo $res->tour_id;?>" class='btn btn-primary' 
	<i class="glyphicon glyphicon-trash"></i> </a>
-->
	
	<?php
	
	clickfordialog('camper_trains','ct_id',$res->ct_id);
	?>
	
	
	</td>

		
			</tr>
			<?php
			}
			?> 
			</tbody>
		</table>

		     
		     
		   <?php  
		     
		     
	     }
	     else
	     {
		     
		     ?>
		     <div class='alert alert-danger'>Train Not Available.</div>
		     <?php
	     }
}

  function get_row($table,$column)
{
global $db;


$query= $db->get_row("SELECT * FROM $table WHERE $column");
if($query)
{
return $query;
}
else
{
$query='0';
return $query;
}

}
  function welcome_msg()
  {
	  ?>


        <script src="bootstrap/js/jquery.min.js"></script>
		
<style>


.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px; 
	color:#fff;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(./dist/img/482.GIF) center no-repeat black;
}

.se-pre-con h1{
  text-align: center;
  margin-top: 240px;
  font-size: 45px;
}
</style>
<script>

    //paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		setTimeout(
  function() 
  {
    //do something special
		$(".se-pre-con").fadeOut("slow");;
		  }, 1400);
	});

 
    </script>
	
<div class="se-pre-con"> 

<h1>WELCOME TO APPOINT MANAGEMENT SOFT</h1></div>
<?php

  }
  
function topmenubatch()
  {
  global $db;
	  
	  ?>
	  
	  <style>
	  #topmenubatch{
		  float: left;
		  width: auto !important;
		  margin-left: 5px;
		  margin-top: 0px !important;
	  }
	  </style>
	  
	  <div class="col-md-12">
            <form method="POST">
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;&nbsp; Camp Dashboard</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
      
                

	 
	      <a data-toggle="tooltip" id='topmenubatch' title="Add Participant" class="btn btn-block  btn-sm btn-default" href="?folder=participants&file=searchexisting&bid=<?php echo $_GET['bid'];?>&type=7">
     
			Add PARTICIPANT
        </a>
     
	
          <a data-toggle="tooltip" id='topmenubatch' title="View Participant" class="btn btn-block  btn-sm btn-default" href="?folder=batchtable&file=viewparticipant&bid=<?php echo $_GET['bid'];?>">
<!--            <i class="glyphicon glyphicon-zoom-in icon-white"></i> -->
           VIEW PARTICIPANT
        </a>


	          <a data-toggle="tooltip" id='topmenubatch' title="Add Instructor" class="btn btn-block btn-sm  btn-default" href="?folder=participants&file=searchexisting&bid=<?php echo $_GET['bid'];?>&type=3">

            ADD INSTRUCTOR 
         </a>


        <a data-toggle="tooltip" id='topmenubatch' class="btn btn-block  btn-sm btn-default" title="Add Batch Discount" href="?folder=batchtable&file=add_batch_discount&bid=<?php echo $_GET['bid'];?>">

            ADD BATCH DISCOUNT
        </a>
                <a data-toggle="tooltip" id='topmenubatch' title="Report"  class="btn btn-block  btn-sm btn-default" href="?folder=batchtable&file=report&bid=<?php echo $_GET['bid'];?>">

           Report
             </a>
             
             <a data-toggle="tooltip" id='topmenubatch' title="Report"  class="btn btn-block  btn-sm btn-default" href="?folder=trains&file=add&bid=<?php echo $_GET['bid'];?>">
				 Trains
	             </a>
     
	  <?php
	  	$res=$db->get_results("SELECT * FROM  allocation where rowstatus ='1'");
	if($res)
	{
	$no=0;
	$array=array('btn bg-purple','btn bg-navy','btn bg-olive','btn bg-maroon');

		foreach($res as $result)
		{
$class=$array[$no];
$no+=1;
if($no==4)
{
$no=0;
}
		?>

        <a data-toggle="tooltip" id='topmenubatch' title="Add Batch Allocation" class="btn btn-block  btn-sm btn-default" href="?folder=allocation&file=list_alloted_camper&bid=<?php echo $_GET['bid']; ?>&aid=<?php echo $result->all_id;?>">

             
<?php echo $result->all_title; ?>
</a>
    
 <?php
  }
            }
  
     ?>                        
                      </div>
              </div>
            </form>
            </div>
            
            
            
            <?php
  }
  
                
                       
                       
                       
                       
                       
                       
                       
               /*   edit reminder */
function editreminder($sr_id)
{

?>

						<?php
global $db;
$edit=$db->get_row("SELECT * FROM self_reminder WHERE sr_id='$sr_id'");
/* $db->debug(); */
if($edit)
{
?>






								<div id='reminderdata<?php echo $sr_id;?>' style='display:none;'>
								
      
			                <form method="post">
			                
					<label for="exampleInputEmail1">Reminder Title</label><INPUT type="text" name="remtitle" id="remtitle" class="form-control" value="<?php echo $edit->sr_title;?>">
							
	<label for="exampleInputEmail1">Reminder Description</label><INPUT type="text" name="remdescription" id="remdescription" class="form-control" value="<?php echo $edit->sr_desc; ?>">
							
	<label for="exampleInputEmail1">Reminder Date</label><INPUT type="text" name="reminderdate" id="remdate1" class="form-control"value="<?php echo $edit->sr_date; ?>">
	
							<label for="exampleInputEmail1">Status</label>
								<?php
															
							 $query1=$db->get_results("SELECT * FROM status");?>
							 				

								<select name="status" class="form-control">
								<option value="000">Select</option>

								<?php 
									/* $categoryname=$query1->c_title;	 */
													
								foreach($query1 as $query1)
								{ 
									/* $name = $query1; */
									$name=$edit->rowstatus;
									
									if($name == $query1->status_id)
									{
										$selected = 'selected';	
									} 
									else
									{
											$selected = '';	
									}
									?>
									<option <?php echo $selected;?> value="<?php echo $query1->status_id; ?>"> <?php echo $query1->status_type; ?> </option>
								<?php 
								
								}
									?>
								</select>
			            <input type="hidden" name='sr_id' value='<?php echo $sr_id;?>'><br />
			           <input type="submit" name='edit' class='btn btn-default' value='Update'>
			            </form>
			           </div>
			           
			     
<?php
}
}
  function reminder()
  {
	  global $db;
	  $nextdate=date('Y-m-d',strtotime('+ 3 days'));

$predate=date('Y-m-d',strtotime('- 3 days'));


$date=date('Y-m-d');

           	if(isset($_POST['edit']))
								{
									$remtitle=$_POST['remtitle'];
									
									$remdescription=$_POST['remdescription'];
									
									$reminderdate=date('Y-m-d',strtotime($_POST['reminderdate']));
									$sr_id=$_POST['sr_id'];
									$status=$_POST['status'];
									
							$get=$db->query("UPDATE self_reminder SET sr_title='$remtitle',sr_desc='$remdescription',sr_date='$reminderdate',rowstatus='$status' where sr_id='$sr_id'");
									//$db->debug();
									if($get)
									{
										$message="Reminder updated successfully";
										
										
									}
									else
									{
										
										
									}
									
							
								}
								
                  $batch_reminder= $db->get_results("SELECT * FROM batch_reminder WHERE (bre_rem_date BETWEEN '$predate' AND '$nextdate') AND bre_status='1' ORDER BY bre_rem_date ASC ");
				 // $db->debug();
if($batch_reminder)
{
?>
<script>

function editreminder(sr_id)
{
    $("#reminderdata"+sr_id).toggle("slow");
}
</script>
<div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                  <h3 class="box-title"> <i class="fa fa-bell"></i> Reminder</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                  	
     <?php if(isset($_GET['reminder'])){ 
     	if($_GET['reminder'] == 'completed')
     	{
     		$msg = 'This reminder has been marked as complete.';
     	?>
     	<div class="alert alert-success  alert-dismissable">
     		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
     		
     		<?php echo $msg; ?>
     		
     	</div>
		
		
     <?php }} ?>             	
     
<?php
$no=0;
foreach($batch_reminder as $batch)
{
$no+=1;
$Batch=$db->get_row("SELECT * FROM Batch WHERE b_id='$batch->bre_btc_id'");
$reminder=$db->get_row("SELECT * FROM reminder WHERE r_id='$batch->bre_rem_id'");
$res=$db->get_row("SELECT * FROM tour WHERE tour_id='$Batch->b_tour_id'");
if($reminder)
{//print_r($reminder);
                  ?>
                    <li>
                      <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  
                      <!-- todo text -->
                      <span class="text"><?php echo $reminder->r_title;?></span>
                      <!-- Emphasis label -->
                      <?php
                      if($batch->bre_rem_date>$date)
                      {
	                      $date1 = new DateTime($date);
$date2 = new DateTime($batch->bre_rem_date);
$diff = $date2->diff($date1)->format("%a");
?>
<small class="label label-success"><i class="fa fa-clock-o"></i>  <?php echo date('d-m-Y',strtotime($batch->bre_rem_date));?></small>
<small class="label label-default"><?php echo $Batch->b_code; ?></small>
<?php
                      }
                      elseif($batch->bre_rem_date==$date)
                      {
	                   ?>
<small class="label label-primary"><i class="fa fa-clock-o"></i>Today</small>
<small class="label label-default"><?php echo $Batch->b_code; ?></small>
<?php     
                      }
                      else
                      {
	                  ?>
<small class="label label-danger"><i class="fa fa-clock-o"></i>  <?php echo date('d-m-Y', strtotime($batch->bre_rem_date));?></small>

<small class="label label-default"><?php echo $Batch->b_code; ?></small>

<?php    
                      }
                      ?>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="?folder=reminder&file=completed&id=<?php echo $batch->bre_id; ?>&kind=batch"><i class="fa fa-check"></i></a>
                      </div>
                    </li>
          
                   <?php
                   }
                   }
                   ?>
                     <?php
                  $result=$db->get_results("SELECT * FROM self_reminder");
                  if($result)
                  {
                
		    foreach($result as $result)
			{
			?>
<li>
                      <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  
                      <!-- todo text -->
                                        
                      <span class="text"><?php echo $result->sr_title;?></span>
                      <!-- Emphasis label -->
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $result->sr_date; ?> </small>
                       <small class="label label-success">Self Reminder</small>
                       
                                          
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
           
						<?php
						 
						?>
 
                   <a onclick="editreminder('<?php echo $result->sr_id;?>');">
                     <i class="fa fa-edit"> </i>
                   </a>

                 <?php //echo editreminder($result->sr_id); ?>
                        <i class="fa fa-trash-o"></i>
                      </div>
                      
                      <?php
                      
                      echo editreminder($result->sr_id);
                      ?>
                    </li>
                    <?php  
                  }
                  }
                  ?>
                  </ul>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                 <!--  <a href="javascript:void(0);" data-toggle="modal" id='Reminder' class='btn btn-primary  btn-sm' data-target="#myModalReminder" Title='Add Reminder'><i class="fa fa-plus"></i> </span>Add Self Reminder</a> -->

			    <div class="modal fade" id="myModalReminder" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
			        <div class="modal-dialog">
			        
			        
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                    <h4 class="modal-title" id="purchaseLabel">Add Self Reminder</h4>
			                </div>
			                <div class="modal-body">
			                <?php
			                if(isset($_POST['addreminder']))
							{
							
								print_r($_POST);
			                	global $message;

				                $remtitle=$_POST['remtitle'];
				                
				                $remdescription=$_POST['remdescription'];
				                
				                $status=$_POST['status'];

				                $remdate=date('Y-m-d',$_POST['remdate']);
				                
				                $adminid=$_SESSION['u_id'];
				                
				                $res=$db->query("INSERT INTO self_reminder VALUES(' ','$remtitle','$remdescription','$remdate','$adminid','$status')");
/*
								echo '<prev'
								echo $res;
								echo '</prev>';
*/
				                if($res)
				                {
					                $message="Reminder added successfully";
					                
				                }
				                else
				                {
					                
					                $message="Reminder not set";
				                }
				                			               
				                }
			                ?>
							<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
							<script src="//code.jquery.com/jquery-1.10.2.js"></script>
							<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
							<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
							<script>

								$(document).ready(function()
								{
									$("#remdate").datepicker({
										changeMonth:true,
										yearRange:"-50:+0",
										dateFormat:"yy-mm-dd",
										changeYear:true
								});
								});
						</script>
			                
			                <form method="post">
			               
							<label for="exampleInputEmail1">Reminder Title</label><INPUT type="text" name="remtitle" id="remtitle" class="form-control">
							
							<label for="exampleInputEmail1">Reminder Description</label><INPUT type="text" name="remdescription" id="remdescription" class="form-control">
							
							<label for="exampleInputEmail1">Reminder Date</label><INPUT type="text" name="remdate" id="remdate" class="form-control">
							
							<label for="exampleInputEmail1">Status</label>

							<?php
									$res=$db->get_results("SELECT * FROM status");
									if($res)
									{?>
									<select name="status" class="form-control">
									<option value="000">Select</option>
									<?php foreach($res as $res)
									{
										?>
										<option value="<?php echo $res->status_id; ?>"><?php echo $res->status_type; ?> </option>
										<?php 
									}
									?>
									</select>
									<?php
									}
									else
									{
										echo "Data Not Available";
									}
								?>
			                <div class="modal-footer">
			                    <button type="submit" class="btn btn-primary" data-dismiss="" name="addreminder">ADD</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
								</div>
			                </form>
			                  </div>
			            </div>
			        </div>
			    </div>
                               <!--
   <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> 
                  Add item</button>
-->
                </div>
              </div>
                   <?php
                   }
                   ?>
  
<?php
            
  }
function dashboard()
{
global $db;

?>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">

<section class="col-lg-7 connectedSortable ui-sortable">


	<?php	
//reminder();
?>
              
              
              
              
              
</section>

                </div>
          
        </section>
      </div>
                 

<?php
}
function loadTopbar()
{
global $db;
?>
      <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
        	<?php
				if(isset($_GET['folder']) && isset($_GET['file']))
				{	        	
				?>
				<a href="index.php?folder=<?php echo $_GET['folder']; ?>&file=view"><?php echo $_GET['folder']; ?></a>
	            <?php 
					}
									
					if(isset($_GET['bid']))
					{
						$batch_table=$db->get_row("SELECT * FROM Batch WHERE b_id='$_GET[bid]'");
						//	$db->debug();
						?>
						
				<a href="index.php?folder=batchtable&file=topbarbatch&bid=<?php echo $_GET['bid']; ?>"> / <?php echo $batch_table->b_code; ?></a>
				
					<a href="index.php?folder=<?php echo $_GET['folder']; ?>&file=<?php echo $_GET['file']; ?>&bid=<?php echo $_GET['bid']; ?>"> / <?php echo str_replace('_',' ',$_GET['file']); ?> Detail</a>
	            <?php
					}
            ?>
        </li>
    </ul>
</div>
<?php
}

function CreatePDF($alt_id,$camp_id)
{

	global $db; 
	//echo'alt'.$alt_id.'campid'.$camp_id;
	$allotment_type= get_row('allocation','all_id='.$alt_id);
	
if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report')) {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report', 0777, true);
}

if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report/'.$camp_id)) {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report/'.$camp_id, 0777, true);
}


if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report/'.$camp_id.'/'.$allotment_type->all_title)) {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report/'.$camp_id.'/'.$allotment_type->all_title, 0777, true);
}


/*$batch_campers_allotment= $db->get_results("SELECT * FROM batch_campers_allotment WHERE batch_id='$camp_id' AND alt_id='$alt_id'");

if($batch_campers_allotment)
{
$batch= get_row('batch_table','b_id='.$camp_id);
$html='';
$html.='<table><tr><td>'.$batch->b_t.'</td></tr></table>';


}
*/
$batch_campers_allotment= $db->get_results("SELECT * FROM batch_campers_allocation WHERE bca_b_id='$camp_id' AND bca_all_id='$alt_id' GROUP BY bca_group");

if($batch_campers_allotment)
{
$batch= get_row('Batch','b_id='.$camp_id);
$html='';
$html.='<html><head><title>Report</title></head><body><table><tr><td><h1>'.$batch->b_code.': '.$allotment_type->all_title.' Allotment</h1></td></tr></table>

<style>

.ReceiptB table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	
	border:#ccc 1px solid;
width:100%;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	
}
.ReceiptB table th {
	
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
.ReceiptB table th:first-child {
	text-align: left;
	
}
.ReceiptB table tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
.ReceiptB table tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
.ReceiptB table tr {
	text-align: center;
	
}
.ReceiptB table td:first-child {
	
	
	border-left: 0;
}
.ReceiptB table td {
	
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
padding:5px;
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
.ReceiptB table tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
.ReceiptB table tr:last-child td {
	border-bottom:0;
}
.ReceiptB table tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
.ReceiptB table tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}

</style>';
     $count=0;
foreach($batch_campers_allotment as $campers)
{
     $batch_campers_allotment12= $db->get_results("SELECT * FROM batch_campers_allocation WHERE (bca_b_id='$campers->bca_b_id' AND bca_all_id='$campers->bca_all_id') AND (bca_group='$campers->bca_group') ");
     

     if($batch_campers_allotment12)
     {
   

$html.='<div class="ReceiptB">

<table><tr>
			<th style="width:10%;text-align:center;">Group No</th>
			<th>Camper Name</th>
			<th style="width:10%;text-align:center;">Age</th>
			<th style="width:10%;text-align:center;">Gender</th>
			</tr>';
			
			foreach($batch_campers_allotment12 as $camper)
			{
			      $count+= 1;
			$camper_detail= get_row('participant','p_id='.$camper->bca_p_id);
			$html.='<tr><td>'.$campers->bca_group.'</td><td style="text-align:left;">'.$camper_detail->p_fname.' '.$camper_detail->p_mname.' '.$camper_detail->p_lname.'</td>';
			
			if($camper_detail->p_gender=='m')
{
$gender= 'M';
}
else 
{
$gender= 'F';
}
$dateofbirth=$camper_detail->p_bd;
$Age = ((time()- strtotime ($dateofbirth)) /(3600 * 24 * 365));
$Age=explode('.',$Age);
$Age=$Age[0];
			$html.='<td>'.$Age.'</td>';
				$html.='<td>'.$gender.'</td></tr>';
			
			}
			
			$html.='</table><br />
			
			';
			
						
}
}
}
$html.='<table><tr>
			<th style="text-align:center;">Total Campers</th>
			<th>'.$count.'</th>
			</tr>
</table>
			</div></body></html>';

//echo $html;

$filepath=$_SERVER['DOCUMENT_ROOT'].'/folliage-soft/private/batch_report/'.$camp_id.'/'.$allotment_type->all_title;
$id=$alt_id.'_'.$camp_id;
	$currentdate= date('Y-m-d');
	require_once($_SERVER['DOCUMENT_ROOT']."/folliage-soft/dompdf/dompdf_config.inc.php");
	//echo'folder'.$folder;

	$dompdf = new DOMPDF();
//	$dompdf->set_base_path($_SERVER['DOCUMENT_ROOT']."/mit_college/liveproject/admin/css/my.css");
	$dompdf->set_paper('a4', 'portrait');
	$dompdf->load_html($html);
	$dompdf->render();

	//The next call will store the entire PDF as a string in $pdf

	$pdf = $dompdf->output();

	file_put_contents($filepath."/".$id.".pdf", $pdf);
	$jsFile = "http://localhost/folliage-soft/private/batch_report/".$camp_id."/".$allotment_type->all_title."/".$id.".pdf";
	//error_reporting(2);
	//echo 'this'.$html;
	?>
<script type="text/javascript"> 
<?php
echo('window.open("'.$jsFile.'", "_blank","",true);');
?>
</script>
<?php
}




function Camper_Detail($id=null)
{
global $db;

?>

<div class="box-body table-responsive">
<table class='table table-striped table-bordered table-condensed'>



<thead><tr><th>Camper Name </th><th> Contact No.</th><th>Email Id</th></tr></thead>
<tbody>
<?php
if($id!=null)
{
$camper= get_row('participant','p_id='.$id);
}
else
{
$camper= get_row('participant','p_id='.$_GET['pid']);
}
?>
<tr>
<td><?php echo $camper->p_fname.' '.$camper-> p_mname.' '.$camper-> p_lname;?></td>
<td><?php echo $camper->p_phn_s;?></td>
<td><?php echo $camper->p_email1;?></td>

</tr>


</tbody>

</table>
</div>
<?php
}













?>



