<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                 
                  <h3 class="box-title">Admin<a href='index.php?folder=admin&file=add' class='btn btn-success'>Add New Record</a></h3>
                </div>			
                 
                 <div class="box-body">
			<table  id="example1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	
			<thead>
			<tr>
			<th>ADMIN ID</th>
			<th> ADMIN NAME </th>
			<th> STATUS</th>
			<th>OPTIONS</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if($admininfo)
			{
				foreach($admininfo as $admininfo)
				{
				?>
					<tr>
					<td> <?php echo $admininfo->admin_id; ?></td>
					<td> <?php echo $admininfo->admin_name; ?></td>
					<td> <?php echo $admininfo->status; ?></td>
					<td><a href="index.php?folder=admin&file=edit&id=<?php echo $admininfo->admin_id; ?>">Edit </a>
					<a href="index.php?folder=admin&file=delete&id=<?php echo $admininfo->admin_id; ?>">delete </a>
					</td>
					</tr>
				<?php	
				}
				
			}
			
			?>
			
			</tbody>
			
			</table>
                 </div>
              </div>
            </div>
          </div>
</section>

