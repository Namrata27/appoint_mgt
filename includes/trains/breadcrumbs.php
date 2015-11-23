        <section class="content-header">
          <h1> 
       
  <?php
          
   if(isset($_GET['ctg_id']))
   {
       $camper_train_group=get_row('camper_train_group','ctg_id='.$_GET['ctg_id']);
            $camper_trains=get_row('camper_trains','ct_id='.$camper_train_group->ct_id);
                $Batch=get_row('Batch','b_id='.$_GET['bid']);
	   echo '<i class="fa fa-train"></i>&nbsp;'.$Batch->b_code.' || Train: '.$camper_trains->ct_type.': '.$camper_trains->ct_title.' || '.$camper_trains->ct_date.' || Train No:'.$camper_trains->ct_campertrainno;
   }
   else
   {
	   echo'Trains';
   }
	      
	          //$db->debug();
	     
          ?>

           </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <?php
            if($_GET['file']=='view_ticket')
            {
	            ?>
	              <li><a href="index.php?folder=batchtable&file=topbarbatch&bid=<?php echo $_GET['bid']; ?>"><?php $batch= get_row('Batch','b_id='.$_GET['bid']);
	          
	         echo $Batch->b_code; ?> </a></li>
	         
	         
	          <li><a href="index.php?folder=trains&file=add&bid=<?php echo $_GET['bid']; ?>">Trains </a></li>
	          
	             <li><a href="index.php?folder=trains&file=view_allotment&bid=<?php echo $_GET['bid']; ?>">View Tickets </a></li>
	              <li>View Vouchers </li>
	            <?php
	            
	            
            }
            if($_GET['file']=='add')
            {
	            ?>
            <li><a href="index.php?folder=batchtable&file=topbarbatch&bid=<?php echo $_GET['bid']; ?>"><?php $batch= get_row('Batch','b_id='.$_GET['bid']);
	          
	         echo $batch->b_code; ?> </a></li>
            
                   <li class="active">Train Add</li>
            <?php
            }
           elseif(isset($_GET['id']) && $_GET['file']=='edit')
            {
            ?>
            <li class="active"><a href="index.php?folder=theme&file=view">Theme</a></li>
             <li class="active">Edit</li>
            <?php
            
            }
              elseif($_GET['file']=='reminderview')
            {
            ?>
            
            <li> <a href="index.php?folder=theme&file=view"> Theme</a></li>
             <li class="active">Reminder</li>
            <?php
            
            }
          elseif($_GET['file']=='view')
            {
            ?>
            <li class="active"><a href="index.php?folder=Theme&file=view"> Theme</a></li>
            <?php
            }
            elseif($_GET['file']=='reminder')
            {
            ?>
            <li class="active"><a href="index.php?folder=Theme&file=view"> Theme</a></li>
              <li class="active"><a href='index.php?folder=Theme&file=reminderview&id=<?php echo $_GET['id'];?>'>Reminder</a></li>
                <li class="active">Add Reminder</li>

            <?php
            
            }
           elseif($_GET['file']=='editreminder')
            {
                   $theme=get_row('reminder','r_id='.$_GET['id']);
            ?>
            <li class="active"><a href="index.php?folder=Theme&file=view"> Theme</a></li>
              <li class="active"><a href='index.php?folder=Theme&file=reminderview&id=<?php echo $theme->r_th_id;?>'>Reminder</a></li>
                <li class="active">Edit Reminder</li>

            <?php
            
            }
            elseif($_GET['file']=='create_ticket')
            {
            ?>
            <li><a href="index.php?folder=batchtable&file=topbarbatch&bid=<?php echo $_GET['bid']; ?>"><?php $batch= get_row('Batch','b_id='.$_GET['bid']);
	          
	         echo $batch->b_code; ?> </a></li>
            
                   <li class="active"><a href="index.php?folder=trains&file=add&bid=<?php echo $_GET['bid']; ?>">Train view</a></li>
                   <li class="active">Create Ticket</li>


            
            
            
                      <?php
            
            }
            elseif($_GET['file']=='view_allotment')
            {
            ?>
            <li><a href="index.php?folder=batchtable&file=topbarbatch&bid=<?php echo $_GET['bid']; ?>"><?php $batch= get_row('Batch','b_id='.$_GET['bid']);
	          
	         echo $batch->b_code; ?> </a></li>
            
                   <li class="active"><a href="index.php?folder=trains&file=add&bid=<?php echo $_GET['bid']; ?>">Train view</a></li>
<!--                    <li class="active"><a href="index.php?folder=trains&file=view_allotment&bid=<?php echo $_GET['bid'];?>">Create Ticket</a></li> -->
					   <li class="active">View Allotment</li>



            
            
            
                      <?php
            
            }





            
            
            
            ?>
          </ol>
        </section>