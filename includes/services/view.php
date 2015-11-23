<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                 
                  <h3 class="box-title">Admin<a href='index.php?folder=customer&file=add' class='btn btn-success'>Add New Record</a></h3>
                </div>			
                 
                 <div class="box-body">
			<table  id="example1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	
			<thead>
			<tr>
			<th>CUSTOMER ID</th>
			<th> CUSTOMER NAME </th>
			<th> CONTACT NO </th>
			<th> EMAIL</th>
			<th> STATUS</th>
			<th>OPTIONS</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if($customerinfo)
			{
				foreach($customerinfo as $customerinfo)
				{
				?>
					<tr>
					<td> <?php echo $customerinfo->cust_id; ?></td>
					<td> <?php echo $customerinfo->cust_name; ?></td>
					<td> <?php echo $customerinfo->cust_contactno; ?></td>
					<td> <?php echo $customerinfo->cust_email; ?></td>
					<td> <?php echo $customerinfo->status; ?></td>
					<td><a href="index.php?folder=customer&file=edit&id=<?php echo $customerinfo->cust_id; ?>">Edit </a>
					<a href="index.php?folder=customer&file=delete&id=<?php echo $customerinfo->cust_id; ?>">delete </a>
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

