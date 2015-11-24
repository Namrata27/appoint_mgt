<?php

$file = $_SERVER['DOCUMENT_ROOT'].'/appoint_mgt/includes/companyconfig/companyconfig.txt';

$handle = fopen($file, 'r');
$data = fread($handle,filesize($file));

$decode=json_decode($data);
/*
echo "<pre>";
print_r($decode);
echo "</pre>";
*/
?>

<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                 
                  <h3 class="box-title">Time Slot<a href='index.php?folder=timeslot&file=add' class='btn btn-success'>Add New Record</a></h3>
                </div>			
                 
                 <div class="box-body">
			<table  id="example1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	
			<thead>
			<tr>
			<th>Employee</th>
			</tr>
			</thead>
			<tbody>
			
			
			<?php
			
			$daysarr = array('0'=>'Monday','1'=> 'Tuesday','3'=>'Wednesday','4'=>'Friday','5'=>'Saturday','6'=>'Sunday');
			
			for($i=0;$i<=6;$i++)
			{
			
				foreach($decode[$i] as $value)
				{
				?>
			
				<tr>
					<td>
						<?php
						echo 'ttt'.	$value['day'];
						?>
			
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

