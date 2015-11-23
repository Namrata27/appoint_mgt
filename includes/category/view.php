<?php
		$res='';
	
		$sql=$db->get_results("SELECT * FROM category WHERE rowstatus!='0'");
			if($sql)
			{
				
			?>
		<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                 
                  <h3 class="box-title">Category<a href='index.php?folder=category&file=add' class='btn btn-success'>Add New Record</a></h3>
                </div>			
			

                  <div class="box-body">
			<table  id="example1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
			<thead>

			<tr>
			<th> c_id</th>
			<th> c_title</th>
			<th>Logic </th>
			<th>c_description </th>
			<th> Status</th>
			<th>Options</th>
			</tr>
			</thead>
			<tbody>
			<?php
		    foreach($sql as $res)
			{
			?>
			<tr>
			<td width=""><?php echo $res->c_id; ?></td>
		
			<td width=""><?php echo $res->c_title; ?></td>
			
			<td width=""><?php echo $res->logic; ?></td>

			
			<td width=""><?php echo $res->c_description; ?></td>
			
			
			<td width="">
			<?php
				$res1=$res->rowstatus;

				if($res!='')
				{	 
					$ans=$db->get_row("SELECT * FROM status WHERE status_id='$res1'");
				if($ans)
				{
					echo $ans->status_type; 
				}
				} 
		     ?>

			 	
			 </td>
			 
		<td><a data-toggle="tooltip" title="Edit Category" href="?folder=category&file=edit&id=<?php echo $res->c_id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> </a> 
		
					<!--
<a  data-toggle="tooltip" title="Delete Category "href="delete.php?tablename=category&colname=c_id&id=<?php echo $res->c_id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-trash"></i> </a></td>

-->
	<?php
	 	    	
		clickfordialog('category','c_id',$res->c_id);
	?>

		</td>
			</tr>
			<?php
			}
			?> 
		</tbody>
	</table>
			  </div>
			</div>
            </div>
          </div>
		</section>
            
	<?php
		}
	else
	{
		echo "Data Not available";
	}
	?>
	
