<style>
.train_class{
	border-bottom: 1px solid;
	margin: 0px 0px 5px 0px;
}
</style>

<div class="col-md-12">
	<div class="box box-primary">
                <div class="box-header">
                  <?php
					  topmenubatch();	

            ?>

                <br/><br/><br/>
                <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                 <li class="active"><a href="#onward" data-toggle="tab" aria-expanded="true">Onward Trains</a></li>
                  <li class=""><a href="#return" data-toggle="tab" aria-expanded="false">Return Trains</a></li>
                 
                                               
                 

                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
            
                  
                       <div class="chart tab-pane active" id="onward">
                  
                   
     <?php
     echo Display_train_tickets('onward');
     ?>
                  </div>
                  
                        <div class="chart tab-pane" id="return">
                  
     <?php
     echo Display_train_tickets('return');
     ?>
                  </div>
                  
                  
                  
                  
                  
                </div>
                </div>
                </div>
	</div>
</div
                  



<?php

 function group_detail1($ctg_id,$no)
  {
	  global $db;
	  ?>
	  
	  	
<div class="col-md-3">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo  'Group No '.$no;?></h3>
                  <div class="box-tools pull-right">
               <a href="?folder=trains&file=view_ticket&bid=<?php echo $_GET['bid'];?>&ctg_id=<?php echo $ctg_id; ?>" Title="View Voucher " class=""><i class="glyphicon glyphicon-list"></i></a>

                  
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                
                
              <?php
              $ticketdetails=$db->get_row("SELECT * FROM camper_train_group WHERE ctg_id='$ctg_id'");
              if($ticketdetails)
              {
              		
              		$trainclass=$db->get_row("SELECT * FROM train_class WHERE tc_id='$ticketdetails->ctg_tc_id' ");
              		if($trainclass)	
              		{
	              		$tc=$trainclass->tc_class;
              		}
              		?>
              		<div class='train_class'>
              		
	           <label> Ticket No : </label> <?php echo $ticketdetails->ctg_ticketno;?><br />
	             <label>PNR No : </label> <?php echo $ticketdetails->ctg_pnr; ?><br />
	             <label> Class : </label> <?php if(isset($tc)){ echo $tc;} ?></b><br />
	            
	            </div>
	            <?php  
              }
	$participant=$db->get_results("SELECT * FROM participant LEFT JOIN camper_train_seatno ON participant.p_id=camper_train_seatno.cts_p_id WHERE camper_train_seatno.cts_ctg_id='$ctg_id'");
			if($participant)
			{
				foreach($participant as $camper)
				{
					
						$icon='<i class="glyphicon glyphicon-remove-circle"></i>';
			?>
			<div class="col-md-12"><?php echo $camper->p_fname.' '.$camper->p_lname;
			if($camper->cts_boggieno!=0)
			{
			
			echo ' :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$camper->cts_boggieno.'-'.$camper->cts_seatno;
			
			} ?>
			
			
			<div style='float:right;'>
			
			<?php 
			//clickfordialog('camper_train_seatno','cts_id',$camper->cts_id,$icon);?>
			</div>
			</div>
			<?php
				}
			}
		?><br>
                      </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
              
	  <?php
  }

?>
