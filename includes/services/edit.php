
<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Services</h3>
                </div><!-- /.box-header -->
     <div class="box-body">

<form name="myform" method="post" action="">

<label for="exampleInputEmail1">Service Name</label><INPUT type="text" name="s_name" class="form-control" value="<?php echo $serviceinfo->cust_name; ?>">
 <span class="label label-warning" id='myform_categorytitle_errorloc' ></span>



<INPUT type="submit" class="btn btn-default" name="edit_service" value="SUBMIT">

</form>

</div>



