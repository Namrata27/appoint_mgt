<?php
include('connection.php');
include("includes/function.php");

global $db;

if(isset($_POST['tour_id']))
{
//print_r($_POST);
$tid=$_POST['tour_id'];
//echo $tid;
$res=$db->get_row("SELECT * FROM tour WHERE tour_id='$tid'");
if($res)
{
	$themeid=$db->get_row("SELECT * FROM theme WHERE t_id='$res->tour_theme'");
	if($themeid)
	{
		$getdetails=$db->get_results("SELECT * FROM reminder WHERE r_th_id='$themeid->t_id'");
		//$db->debug();
		if($getdetails)
		{
		foreach($getdetails as $getdetails)
		{
		if(isset($_POST['batchid']))
		{
		$bid=$_POST['batchid'];
			$batch_reminder= $db->get_row("SELECT * FROM batch_reminder WHERE bre_btc_id='$bid' AND bre_rem_id='$getdetails->r_id'");
			if($batch_reminder)
			{
				?>
			<input type="checkbox" checked value="<?php echo $getdetails->r_id;?>" name="reminder[]"> <?php echo $getdetails->r_title;?><br />
			
			<?php
			}
			else
			{
			?>
			<input type="checkbox" value="<?php echo $getdetails->r_id;?>" name="reminder[]"> <?php echo $getdetails->r_title;?><br />
			
			<?php	
			}
		}
		else
		{
			
			?>
			<input type="checkbox" value="<?php echo $getdetails->r_id;?>" name="reminder[]"> <?php echo $getdetails->r_title;?><br />
			
			<?php
		}	
		}
		}
		else
		{
			?>
			<span class="label label-warning">Reminder Not Available</span>
			<?php
		}
	}
}
}
if(isset($_GET['searchbox']))
{
//print_r($_GET);
$searchbox= $_GET['searchbox'];

$res=$db->get_results("SELECT * FROM tour WHERE tour_title LIKE '%$searchbox%'");

/* $db->debug(); */

			if(isset($res))
			{
			?>
			<div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2> Tours</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table">                
                
			<!-- <caption> <b>TOUR DETAILS </b></caption> -->
			<thead>
			<tr>
			<th>Tour Id</th>
			<th>Tour Title</th>
			<th>Tour Logic</th>
<!-- 			<th>Upcoming Batches</th> -->
			<th>Options </th>
			</tr>
			</thead>
			<tbody>

			<?php
		    foreach($res as $res)
			{
			?>
			<tr>
			<td width=""><?php echo $res->tour_id ?></td>
			<td width=""><?php echo $res->tour_title; ?></td>
			<td width=""><?php echo $res->tour_code; ?></td>
			<td>
				<a data-toggle="tooltip" title="Edit Tour" href="?folder=tour&file=edit&id=<?php echo $res->tour_id;?>" class='btn btn-primary'>
					<i class="glyphicon glyphicon-edit"></i>
				</a>
				<?php
						clickfordialog('tour','tour_id',$res->tour_id);
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
		
			
		
	<?php
		}
	else
	{
/* 		echo "Tour Not available"; */
	}
	
	
	
	$participant=$db->get_results("SELECT * FROM participant WHERE p_fname LIKE '%$searchbox%'");
	if($participant)
	{
	
	?>
					<div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2> Participants</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table">   
                    
           
			

			<thead>
			<tr>
			
			<th> Name</th>
				<th> Birthdate</th>
			<th>Contact no </th>
		<th>Id Proof</th>
			<th>Option </th>
			</tr>
			</thead>
			<tbody>
			<?php
			 foreach($participant as $rows)
			 {
			 ?>
			 <tr>
			
		
		<td><?php echo $rows->p_fname.' '.$rows->p_lname; ?></td>
		
		
		
		<td><?php echo date('d-M-Y',strtotime($rows->p_bd)); ?></td>

				
		<td><?php echo $rows->p_phn_s; ?></td>
	
<!-- 		<td><?php echo $rows->p_idcard; ?></td> -->
		
		
			<td width="">
			<?php
				$res1=$rows->p_idcardtype_id;

				if($rows!='')
				{	 
				
					$ans=$db->get_row("SELECT * FROM idcardtype WHERE idcardtype_id='$res1'");
				
					if($ans)
					{
						echo $ans->idcardtype_title; 
					}
				} 
		     ?>

			 	
			 </td>

		<td width="10%" valign="center"><a data-toggle="tooltip" title="Edit Participant" href="?folder=participants&file=edit&id=<?php echo $rows->p_id;?>" class="btn btn-primary"> <i class="glyphicon glyphicon-edit">
		 </i>
</a>
		<?php
	 	    	
			clickfordialog('participant','p_id',$rows->p_id);
		?>
	</tr>
	<?php
	}
	?>
			</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php 
	}
	else
	{
/* 		echo "Participant Not available"; */
	}
	
	
		$theme=$db->get_results("SELECT * FROM theme WHERE t_title LIKE '%$searchbox%' || t_description LIKE '%$searchbox%'");
		
		if($theme)
		{
		?>
		
							<div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2> Themes View</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
     
			  
                    <table class="table">   


			<thead>
			<tr>
			<th> Theme Id</th>
			<th> Theme Name</th>
			<th>Option</th>

			</tr>
			</thead>
			<tbody>

			<?php
		    foreach($theme as $res)
			{
			?>
			<tr>
			<td width=""><?php echo $res->t_id ?></td>
		
			<td width=""><?php echo $res->t_title; ?></td>
			
		<td><a data-toggle="tooltip" title="Edit Theme" href="?folder=Theme&file=edit&id=<?php echo $res->t_id;?>" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>

	<!-- <a  data-toggle="tooltip" title="Delete Theme"href="delete.php?tablename=theme&colname=t_id&id=<?php echo $res->t_id;?>" class='btn btn-primary'><i class="glyphicon glyphicon-trash"></i></a> --> 
	
<?php
	 	    	
		clickfordialog('theme','t_id',$res->t_id);
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
	<?php
	}else
	{
/* 		echo "Theme Not Available"; */
	}
	
	
			$category=$db->get_results("SELECT * FROM category WHERE c_title LIKE '%$searchbox%'");
			
			if($category)
			{
				
			?>
				<div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2> Category</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
        
			  
                    <table class="table">   
		
			<thead>

			<tr>
			<th> c_id</th>
			<th> c_title</th>
			<th>c_description </th>
			<th>Options</th>

			</tr>
			</thead>
			<tbody>
			<?php
		    foreach($category as $res)
			{
			?>
			<tr>
			<td width=""><?php echo $res->c_id; ?></td>
		
			<td width=""><?php echo $res->c_title; ?></td>
					
			<td width=""><?php echo $res->c_description; ?></td>
								 
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
	<?php
		}
	else
	{
/* 		echo "Category Not available"; */
	}

	
	}
?>

<?php

if(isset($_POST['birthdate']))
{
$tourid=$_POST['tourid'];

$res=$db->get_row("SELECT * FROM tour WHERE tour_id='$tourid'");

$catid=$res->tour_category;

$birthDate= $_POST['birthdate'];

  //date in mm/dd/yyyy format; or it can be in other formats as well
  //$birthDate = "12/17/1983";
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
    
 // echo "<br />Age is:" . $age.'<br />'; 
/*
  if(24<10)
  {
	  
	  echo'true';
  }
  else
  {
	  echo'false';
  }
*/
  $cat= $db->get_row("SELECT * FROM category WHERE c_id='$catid'");
  // $db->debug(); 
   if($cat)
	{
	if($cat->logic!='')
	{
		$logic=explode('&&',$cat->logic);
		
	//print_r($logic); 
	$count=count($logic);
	$no=0;
	foreach($logic as $log)
	{
	
		$condition=str_replace(' ', '', $log);
		$condition=preg_replace('/[0-9]+/', '', $condition);
		$int = filter_var($log, FILTER_SANITIZE_NUMBER_INT);
	if($condition=='<')
	{
	
		if($age<$int)
			{
			//echo $age.'conditionssss111:'.$condition;
	$no+=1;
	
		}
	}
	elseif($condition=='<=')
	{
		if($age<=$int)
			{
				//echo $age.'conditionsss222:'.$condition;
				$no+=1;
			}
	}
	elseif($condition=='>=')
	{
		if($age>=$int)
			{
			//echo $age.'conditionssss333:'.$condition;
	$no+=1;
	
		}
	}
	elseif($condition=='>')
	{
		if($age>$int)
			{
				//echo $age.'conditionssss444:'.$condition;
	$no+=1;
	
		}
	}
		
		
		if($no==1)
		{
			//break;
		}
	
	
	
	}
	if($no==0 || $no!=$count)
	{
	//echo'0';
	$catid='';
	$catNo=0;
	  $cat= $db->get_results("SELECT * FROM category");
   //$db->debug(); 
   if($cat)
	{
	foreach($cat as $ct)
	{	
	if($ct->logic!='')
	{
	$logic=explode('&&',$ct->logic);
	/* print_r($logic); */
	$count=count($logic);
		
	foreach($logic as $log)
	{
	
		$condition=str_replace(' ', '', $log);
		$condition=preg_replace('/[0-9]+/', '', $condition);
		$int = filter_var($log, FILTER_SANITIZE_NUMBER_INT);
	if($condition=='<')
	{
	
		if($age<$int)
			{
			// echo $age.'conditionssss111:'.$condition;
	$catNo+=1;
	//$catid.=$ct->c_id;
		}
	}
	elseif($condition=='<=')
	{
		if($age<=$int)
			{
			//echo $age.'conditionsss2222:'.$condition;
	$catNo+=1;
	//$catid.=$ct->c_id;
		}
	}
	elseif($condition=='>=')
	{
		if($age>=$int)
			{
			//echo $age.'conditionssss333:'.$condition;
	$catNo+=1;
	//$catid.=$ct->c_id;
		}
	}
	elseif($condition=='>')
	{
		if($age>$int)
			{
			//	echo $age.'conditionssss444:'.$condition;
	$catNo+=1;
	//$catid.=$ct->c_id;
		}
	}
		
		
		if($catNo==1)
		{
			//break;
		}
	
	
	
	}
		if($catNo==$count)
		{
			//echo'this is cat'.$ct->c_id.' lop count'.$catNo.' count->'.$count.'<br />';
				$catid.=$ct->c_id.',';
		}
	
	$catNo=0;
	
	
	}
	}
	}
	
	//echo'sdf dskfs dfka dskfs'.$catid.'<br />';
	$catid=explode(',',$catid);
	//if(is_array(($catid))
	//{
		$enddate=date('Y-m-d');
		?>
	
		<!--
<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong></strong> Suggested Tours
                </div>
		
-->
		
		<?php
		$no1=0;
		/*
foreach($catid as $catData)
		{
		?>
		<table class="table table-bordered span4" id='Suggested'>
		<?php
		
		$category= $db->get_row("SELECT * FROM category WHERE c_id='$catData'");		
				if($category)
				{
				?>
					<tr><td><b>Category Name:  </b><?php echo $category->c_title;?></td></tr>
					<?php
				
				
				}
			$tour= $db->get_row("SELECT * FROM tour WHERE tour_category='$catData'");		
				if($tour)
				{
			
					?>
					<tr><td><b>Tour Name :</b><?php echo $tour->tour_title;?></td></tr>
					<?php
					$Batch= $db->get_results("SELECT * FROM Batch WHERE (b_tour_id='$tour->tour_id' AND b_startdate>='$enddate') AND(rowstatus='1')");
					//$db->debug();
					if($Batch)
					{
						
						foreach($Batch as $b)
						{
								$no1+=1;
							?>
							<tr> 
							<td>
							<input type="radio" name='BatchID' value='<?php echo $b->b_id;?>'>
							<?php echo date('d-m-Y',strtotime($b->b_startdate)).' To '.date('d-m-Y',strtotime($b->b_enddate));?>
							</td>
							</tr>
							
							<?php
						}
					}
					else
					{
						?>
							<tr> 
							<td>
							<div class="alert alert-danger" id='errorCamper'>
	<strong>Error!</strong> Batches Not Available.
</div>
 
							</td>
							</tr>
							
							<?php
					}
				}
				?>
				
				</table>
				<?php				
		}
*/


		if($no1!=0)
		{
		?>
		 <INPUT type="submit" id='submit_add' class="btn btn-default" name="addparticipant" value="SUBMIT">
		<?php
		}
		?>	
		
		<?php
	
	
	//}
	
	
	}
	else
	{
	echo'1';
	}
	}
	else
	{
	echo'1';
	}
	}
}

?>