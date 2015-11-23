<?php
$starttime=array("10","11","12","1","2","3","4","5","6");
?>

<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Timing Setup</h3>
                </div>			
                 <div class="box-body">
			<table  id="example1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<tr>
				<td>
				<label for="exampleInputEmail1">Full day timing :</label>
				</td>
				<td>
					<select name="timeslot">
					<option> start time</option>
					<?php
					foreach($starttime as $strttime)
					{
						?>
						<option value="<?php echo $strttime; ?>"><?php echo $strttime;?></option>
						
					<?php		
					}
					?>
					</select>&nbsp;&nbsp;&nbsp;
					<label for="exampleInputEmail1"> to </label>
					&nbsp;&nbsp;&nbsp;<select name="timeslot">
					<option> end time</option>
					<?php
					foreach($starttime as $strttime)
					{
						?>
						<option value="<?php echo $strttime; ?>"><?php echo $strttime;?></option>
						
					<?php		
					}
					?>
					</select>
				</td>
				</tr>
				<table  id="example1" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					 <h4 class="box-title">Day wise timing setup :</h4>
				<thead>
					<tr>
						<th>Day</th>
						<th>Weekly off</th>
						<th> Full Day </th>
						<th> Start time To End Time</th>
						
					</tr>
				</thead>
				<tbody>
				
				<?php
				$timestamp = strtotime('next Monday');
				$days = array();
				for ($i = 0; $i < 7; $i++) {
					$days[] = strftime('%A', $timestamp);
					$timestamp = strtotime('+1 day', $timestamp);
					?>
					<tr>
					<td> <?php echo $days[$i]; ?></td>
					<td><input type="checkbox" name="weekly_off" id="weekly_off<?php echo $i; ?>" class="week123"></td>
					<td>
					<input type="checkbox" name="fullday" id="fullday<?php echo $i;?>" >
					</td>
					<td>
					<select name="starttime" id="starttime<?php echo $i;?>">
					<option> start time</option>
					<?php
					foreach($starttime as $strttime)
					{
						?>
						<option value="<?php echo $strttime; ?>"><?php echo $strttime;?></option>
						
					<?php		
					}
					?>
					</select>&nbsp;&nbsp;&nbsp;
					
					<label for="exampleInputEmail1"> to </label>
					
					&nbsp;&nbsp;&nbsp;
					<select name="endtime" id="endtime<?php echo $i;?>">
					<option> end time</option>
					<?php
					foreach($starttime as $strttime)
					{
						?>
						<option value="<?php echo $strttime; ?>"><?php echo $strttime;?></option>
						
					<?php		
					}
					?>
					</select>
				</td>

					</tr>
					<?php
					}
				
				?>
				
				
				</tbody>
				</table>				
			</table>
                 </div>
              </div>
            </div>
          </div>
</section>

