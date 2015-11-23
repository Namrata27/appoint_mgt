<style>
.train_class{
	border-bottom: 1px solid;
	margin: 0px 0px 5px 0px;
}
</style>
<?php
$camper_train_group=get_row('camper_train_group','ctg_id='.$_GET['ctg_id']);

?>
<section class="content">
          <div class="row">
            <div class="col-md-6">
            <form method='POST'>
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class='fa fa-list'></i>&nbsp;&nbsp;View Voucher</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                <?php
                
                if(isset($message))
                {
	                
	                echo '<div class="alert alert-success">'.$message.'</div>';
                }
                ?>
                
                <div class="form-group">
                    <label>PNR No</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-fw fa-train"></i>
                      </div>
                      <input type="text" name='ctg_pnr' value='<?php if($camper_train_group){ echo $camper_train_group->ctg_pnr; } ?>' placeholder="Enter PNR No..." class="form-control" >
                    </div><!-- /.input group -->
                  </div>
                  
                  
                                  <div class="form-group">
                    <label>Ticket No</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-fw fa-train"></i>
                      </div>
                      <input type="text" name='ctg_ticketno' value='<?php if($camper_train_group) { echo $camper_train_group->ctg_ticketno; } ?>'  placeholder="Enter Ticket No..." class="form-control" >
                    </div><!-- /.input group -->
                  </div>
                  
                  
                  
                  
                  
                  

<div class="form-group">
                      <label for="exampleInputEmail1">Train Class</label>
                  
                      <?php 
                     
                      	$trainclass=$db->get_results("SELECT * FROM train_class");
                      	if($trainclass)
                      	{
                      	?>
                      	    <select name="ctg_tc_id" class="form-control">
                      	<?php
	                      	foreach($trainclass as $trainclass)
	                      	{
	                      		if(isset($_GET['ctg_id']))
	                      		{
							  		if($trainclass->tc_id==$camper_train_group->ctg_tc_id)
							  		{
							  				                      	
							  		?>
							  			 <option value="<?php echo $trainclass->tc_id; ?>" selected><?php echo $trainclass->tc_class; ?></option>
							  		 <?php
							  		}
							  			 else
							  			 {
								  			?> 
								  			 	<option value="<?php echo $trainclass->tc_id; ?>"><?php echo $trainclass->tc_class; ?></option>
								  			<?php

							  			 }
							  		}
							  		 else
							  			 {
								  			?> 
								  			 	<option value="<?php echo $trainclass->tc_id; ?>"><?php echo $trainclass->tc_class; ?></option>
								  			<?php

							  			 }

						  		?>
		                      	<?php
	                      	}
	                      	?>
                      </select>
	                      	<?php
                      	}
                      	else
                      	{
	                      	?>
	                      	<span class="label label-warning"> Data not available </span>
	                      	<?php
                      	}
                      
                      ?>
</div>
<input type="hidden" name='userid' value='<?php echo $_SESSION['u_id'];?>'>
<input type="submit" name='submit' class='btn btn-success' value='Save Detail'>

                
                </div>
              </div>
            </form>
            </div>
            
            
            
            
            
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Campers</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                
                     <?php
                
                if(isset($msg1))
                {
	                
	                echo '<div class="alert alert-success">'.$msg1.'</div>';
                }
                ?>
                
                <form method="POST">
      
              
                <?php
               // $camper_train_seatno= $db->get_results("SELECT * FROM camper_train_seatno WHERE cts_ctg_id='$_GET[ctg_id]'");
                	$camper_train_seatno=$db->get_results("SELECT * FROM participant LEFT JOIN camper_train_seatno ON participant.p_id=camper_train_seatno.cts_p_id WHERE camper_train_seatno.cts_ctg_id='$_GET[ctg_id]'");
                if($camper_train_seatno)
                {
	                ?>
	                <style>
	                #camper_train_seatno th{
	                  color: #3c8dbc;
	                  }
	                </style>
	                <table class="table table-bordered" id='camper_train_seatno'>
	                <thead>
	                <tr>
	                <th>Name</th>
	                <th>Age</th>
	                <th>Gender</th>
	                <th>Seat no</th>
	                <th>Boggie no</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php
	                foreach($camper_train_seatno as $camper)
	                {
	                
	                $gender=$camper->p_gender;
	                if($gender!='')
	                {
		                       $gen=$gender[0]; 
	                }
	                else
	                {
		                $gen='';
	                }
	        
	                $birthDate= $camper->p_bd;

  //date in mm/dd/yyyy format; or it can be in other formats as well
  //$birthDate = "12/17/1983";
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
	                if(is_array($birthDate) && $birthDate!=null)
	                {
	                  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
        }
        else
        {
	        echo'<span class="label label-danger">Birthdate Not Available.</span>';
        }
		                ?>
		                
		                <tr>
		                <td>
		                <?php
		                echo $camper->p_fname.' '.$camper->p_mname.' '.$camper->p_lname;?>
		                </td>
		                <td><?php echo $age;?></td>
		                <td><?php echo $gen;?></td>
		                <td><input type="text" value='<?php if($camper->cts_seatno!=0) { echo $camper->cts_seatno; } ?>' name='seat_no[<?php echo $camper->cts_id;?>]' placeholder="Seat no"></td>
		                <td><input type="text" value='<?php if($camper->cts_boggieno!=0) { echo $camper->cts_boggieno; } ?>' name='boggie_no[<?php echo $camper->cts_id;?>]' placeholder="Boggie no"></td>
		                </tr>
		                
		                <?php
		                
	                }
	                ?>
	                
	                </tbody>
	                </table>
	                <?php
                }
                else
                {
	                
	                ?>
	                <div class='alert alert-danger'>Seat no available.</div>
	                <?php
                }
                ?>
                <input type="submit" name='saveTrainSeat' class='btn btn-primary' value='Save Detail'>
                </form>
                </div>
              </div>
            </div>




          </div>
</section>
         


