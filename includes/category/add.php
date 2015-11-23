<?php
/*
if(isset($_POST['submit']))
{
$catname=$_POST['categorytitle'];

$catdesc=$_POST['categorydesc'];

global $message;

include($_SERVER['DOCUMENT_ROOT'] ."/Travel/connection.php");
			
$res =$db->query("INSERT INTO category VALUES('','$catname','$catdesc', '')");
		//	$r=mysql_query($res);
		echo $res;
			if($res)
			{
					echo "insert";
				}
				else
				{
					echo "error";		
				}			
			}
*/
?>
<!--<link rel="stylesheet" type="text/css" href="add.css"/>-->

<BODY>

<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Category</h3>
                </div><!-- /.box-header -->
     <div class="box-body">

<form name="myform" method="post" action="">
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





<label for="exampleInputEmail1">Category Title</label><INPUT type="text" name="categorytitle" class="form-control">
 <span class="label label-warning" id='myform_categorytitle_errorloc' ></span>

<label for="exampleInputEmail1">Category Description</label><INPUT type="textarea" name="categorydesc" class="form-control">
<span class="label label-warning" id='myform_categorydesc_errorloc' ></span>


<label for="exampleInputEmail1">Category Age (Logic)</label><INPUT type="text" name="logic" class="form-control">
<span class="label label-warning" id='myform_logic_errorloc' ></span>


<label for="exampleInputEmail1">Status</label>
<?php 
	$res=$db->get_results("SELECT * FROM status");
	if($res)
	{ 
	?>
<select name="s1" class="form-control">
<!-- <option value="000">Select</option> -->
<?php
 foreach($res as $res)
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



 <div class="l">&nbsp;</div> <INPUT type="submit" class="btn btn-default" name="submit" value="SUBMIT">

<div class="a"> <div class="l">&nbsp;</div> <div class="r"><a href="?folder=category&file=view">View</div></div>
 
</form>

</div>

</BODY>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript" src="http://localhost/Travel/js/gen_validatorv4.js"> </script>

 <script type="text/javascript">
 
$(document).ready(function()

{

    var frmvalidator  = new Validator("myform");
    
    frmvalidator.EnableOnPageErrorDisplay();
    
    frmvalidator.EnableMsgsTogether();
   
    frmvalidator.addValidation("categorytitle","req","Enter the category name");
	
	frmvalidator.addValidation("categorydesc","req","Enter the category description");
	
	frmvalidator.addValidation("logic","req","Enter the category logic");
	
    frmvalidator.addValidation("s1","dontselect=000","Pls select the status");
   
   /*
frmvalidator.addValidation("s1","dontselect=000");
      
   frmvalidator.addValidation("s3","dontselect=000");
*/


/*
 frmvalidator.addValidation("Email1","email","Please enter valid emial ID ");
 
 
 frmvalidator.addValidation("Phone","num","Please enter number ");
*/
 
 
 });
</script>

