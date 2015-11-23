<section class="content">
 
 <div class="col-md-6">
	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Admin</h3>
                </div><!-- /.box-header -->
     <div class="box-body">

 
 <form method="post" action="">
  <label for="exampleInputEmail1">Admin Name</label><input type="text" name="admin_name" value="<?php echo $admininfo->admin_name; ?>" class="form-control"/>
     <label for="exampleInputEmail1">Username</label> <input type="text" name="admin_username" value="<?php echo $admininfo->admin_username; ?>" class="form-control"/>
   <label for="exampleInputEmail1">Password</label>   <input type="text" name="admin_password" value="<?php echo $admininfo->admin_password; ?>" class="form-control"/>
   <label for="exampleInputEmail1">Type</label>   <input type="text" name="admin_type" value="<?php echo $admininfo->admin_type; ?>" class="form-control" />
    <label for="exampleInputEmail1">status</label>  <input type="text" name="status" value="<?php echo $admininfo->status; ?>" class="form-control" />
           
      <input type="submit" name="edit_admin"/>
      </form>
     </div>
	</div>
 </div>
 
 </section>