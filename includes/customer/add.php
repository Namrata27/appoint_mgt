<BODY>
<div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New customer</h3>
                </div><!-- /.box-header -->
     <div class="box-body">

<form name="myform" method="post" action="">

<label for="exampleInputEmail1">Customer Name</label><INPUT type="text" name="cust_name" class="form-control">
 <span class="label label-warning" id='myform_categorytitle_errorloc' ></span>

<label for="exampleInputEmail1">Contact No</label><INPUT type="textarea" name="cust_contactno" class="form-control">
<span class="label label-warning" id='myform_categorydesc_errorloc' ></span>

<label for="exampleInputEmail1">Email-Id</label><INPUT type="text" name="cust_email" class="form-control">
<span class="label label-warning" id='myform_logic_errorloc' ></span><br />

<INPUT type="submit" class="btn btn-default" name="customer_add" value="SUBMIT">

</form>

</div>

</BODY>


