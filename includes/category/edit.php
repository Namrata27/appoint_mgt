
<?php

/*
include($_SERVER['DOCUMENT_ROOT']."/TRAVEL/connection.php");
$id=$_GET['id'];
if(isset($_GET['id']))
{
if(isset($_POST['add_edit']))
{
$name=$_POST['title'];
$desc=$_POST['description'];
$qry=$db->query("UPDATE category SET c_title='$name',c_description='$desc' WHERE c_id='$id'");
if($qry)
{
	echo "Record updated successfully";
}
}
}
*/
$id=$_GET['id'];

$query1=$db->get_row("SELECT * FROM category WHERE c_id='$id'");

?>
<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Edit Category</h3>
                </div><!-- /.box-header -->
     <div class="box-body">





<form name="myform" action="" method="POST">
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



			
							<label for="exampleInputEmail1">Category Name</label><input type="text" value="<?php echo $query1->c_title;?>" name="title" size="" class="form-control"/>
							<span class="label label-warning" id='myform_title_errorloc' ></span>
					 
							<label for="exampleInputEmail1">Age</label><input type="text" value="<?php echo $query1->logic;?>" name="logic" size="" class="form-control"/>
							<span class="label label-warning" id='myform_logic_errorloc' ></span>
				
							<label for="exampleInputEmail1">Category Description </label><textarea  class="form-control" rows="3" name="description" cols="7"> <?php echo $query1->c_description;?></textarea>
							<span class="label label-warning" id='myform_description_errorloc' ></span>
						
										
							<label for="exampleInputEmail1">Status</label>
							<?php
																													
						 $query=$db->get_results("SELECT * FROM status");?>
							 				

								<select name="s1" class="form-control">
<!-- 								<option value="000">SELECT</option> -->
								<?php 
									/* $categoryname=$query1->c_title;	 */
													
								foreach($query as  $qry)
								{ 
									/* $name = $query1; */
									$name=$query1->rowstatus;
									
									if($name == $qry->status_id)
									{
										$selected = 'selected';	
									} 
									else
									{
											$selected = '';	
									}
									?>
									<option <?php echo $selected;?> value="<?php echo $qry->status_id; ?>"> <?php echo $qry->status_type; ?> </option>
								<?php 
								
								}
									?>
								</select>
				
				
				<div class="l">&nbsp;</div> <div class=""><input type="submit" name="add_<?php echo $file; ?>" value="Update"/ class="btn btn-default">
				
			</form>
			
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript" src="http://localhost/Travel/js/gen_validatorv4.js"> </script>

 <script type="text/javascript">
 
$(document).ready(function()

{

    var frmvalidator  = new Validator("myform");
    
    frmvalidator.EnableOnPageErrorDisplay();
    
    frmvalidator.EnableMsgsTogether();
   
    frmvalidator.addValidation("title","req","Enter the category name");
	
	frmvalidator.addValidation("description","req","Enter the category description");
	
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
