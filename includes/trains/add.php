<?php 
$qry=$db->get_results("SELECT * FROM train_class");
/* $q=$db->get_results("SELECT * from participant"); */
?>
<!--<link rel="stylesheet" type="text/css" href="add.css"/>-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script>

$(document).ready(function(){
        $("#datepicker").datepicker({
           changeMonth:true,
           yearRange:"-50:+0",
            dateFormat:"yy-mm-dd",
           changeYear:true
        });
        
             });

/*

function reminder()
{
  var tourid=$("#tourname").val();
  $.ajax({
	 url:"ajax.php",
	 type:'POST',
	 data:'tour_id='+tourid,
	 success:function(response)
	 {
		 
		$("#responseData").html(response);
	 }
		  
  });
}
*/
</script>
<?php
topmenubatch();	

            ?>

<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Trains</h3>
                </div><!-- /.box-header -->
     <div class="box-body">

     

<form name="form1" method="post" action="" id="myform" enctype="multipart/form-data">
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
if(isset($_GET['id']))
{

	$test=$db->get_row("SELECT * FROM camper_trains WHERE ct_id='$_GET[id]'");

}
 ?>

<label for="exampleInputEmail1">Train Title</label><INPUT type="text" name="ct_title" id="traintitle" class="form-control" value="<?php if(isset($_GET['id'])){  echo $test->ct_title; } ?>">

<span class='label label-warning' id='myform_startdate_errorloc'></span>

<br />


<label for="exampleInputEmail1">Train No</label>
<INPUT type="text" name="ct_campertrainno" id="ct_campertrainno" value="<?php if(isset($_GET['id'])){  echo $test->ct_campertrainno; } ?>" class="form-control">
<br/>


<!--
<label for="exampleInputEmail1">Train Type</label>
<?php
if($qry)
{
?>
	<select name="traintype" id="traintype" class="form-control">
	<option value="000">ChooseYours</option>
<?php
 foreach($qry as $qry1) 
{
?>
				<option value="<?php echo $qry1->tc_id;?>"><?php echo $qry1->tc_class;?> </option>
				<?php
	
}
	?>
	</select>	
	<div id='responseData'>
	</div>
	<?php
}
else
	{
		echo "Data Not Available";
	}
	
?>

<br/>
-->
<label for="exampleInputEmail1">Train type</label>
<select name="ct_type" id="" class="form-control">
<?php
if(isset($_GET['id']))
{
if($test->ct_type=='onward')
{
?>

	<option value="onward" selected> Onward </option>
	<option value="return"> Return </option>
	<?php
}
else
{
?>

	<option value="onward"> Onward </option>
	<option value="return" selected> Return </option>
	<?php
}
}
else
{
?>

	<option value="onward"> Onward </option>
	<option value="return"> Return </option>
	<?php
	}
	?>
</select> 
<br/>

<label for="exampleInputEmail1">Train Date</label>
<INPUT type="text" name="ct_date" id="datepicker" class="form-control" value="<?php if(isset($_GET['id'])){  echo $test->ct_date; } ?>">
<br/>
<input type="hidden" name='ct_b_id' value='<?php echo $_GET['bid'];?>'>
<input type="hidden" name='userid' value='<?php echo $_SESSION['u_id'];?>'>

<label for="exampleInputEmail1">Status</label>

<?php
$res=$db->get_results("SELECT * FROM status");
if($res)
{?>
<select name="rowstatus" class="form-control">
<!-- <option value="000">Select</option> -->
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
<br />
<!-- <div class="a"> <div class="l">Participant Id  </div> <div class="r"><INPUT type="text" name="pname" class="" ></div></div> -->


 <INPUT type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
 <?php
 	if(isset($_GET['id']))
{
?>
 <a href='?folder=trains&file=add&bid=<?php echo $_GET['bid']; ?>' class='btn btn-success'><i class="fa fa-fw fa-train"></i> Add New Train</a>
<?php
}
?>
<!-- <div class="a"> <div class="l">&nbsp;</div> <div class="r"><a href="?folder=batchtable&file=view">View</div></div> -->
 
</form>

</div>
	</div>
</div>




<!-- Onward view -->
<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
            
                  <h3 class="box-title"><i class="fa fa-fw fa-train"></i>Onward<a href='?folder=trains&file=create_ticket&bid=<?php echo $_GET['bid']; ?>' data-toggle="tooltip" title="Create New Tickets" class='btn btn-default'style="float:right;"><i class="fa fa-fw fa-ticket"></i>Create Ticket </a>
                  	<a data-toggle="tooltip" title="View Allotment" href="?folder=trains&file=view_allotment&bid=<?php echo $_GET['bid']; ?>" style="float:right;" class='btn btn-default'>
		 <i class="glyphicon glyphicon-list-alt">
		 </i> View Allotment
		</a>
                  </h3>
                </div><!-- /.box-header -->
     <div class="box-body">
       <?php
    echo camp_rel_trains('onward');
	     
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
         echo camp_rel_trains('return');
     ?>
     </div>
	</div>
</div>




<!-- <input data-no-uniform="true" type="checkbox" class="iphone-toggle"> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<!--
<script type="text/javascript" src="http://localhost/Travel/js/gen_validatorv4.js"> </script>

 <script type="text/javascript">
$(document).ready(function(){
    var frmvalidator  = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
   
   
   frmvalidator.addValidation("startdate","req","Pls select the start date");
   
   frmvalidator.addValidation("enddate","req","Pls select the end date");

   frmvalidator.addValidation("limit","num","Allow no only");
   frmvalidator.addValidation("limit","req","Please enter limit.");
   
   frmvalidator.addValidation("s1","dontselect=000","Allow numbers only");
   
   frmvalidator.addValidation("batchfee","num","Allow numbers only");


/*
 frmvalidator.addValidation("Email1","email","Please enter valid emial ID ");
 
 
 frmvalidator.addValidation("Phone","num","Please enter number ");
*/
 
 
 });
</script>

-->














