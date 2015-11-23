<?php
function DeleteModal($ColId,$table)
{
?>
<a href='#' data-toggle="modal" class="btn btn-primary" data-target="#myModal<?php echo'PopUpModalSend'.$ColId;?>" Title='Delete'><i class="fa fa-fw fa-trash-o"></i></span></a>

			    <div class="modal fade" id="myModal<?php echo'PopUpModalSend'.$ColId;?>" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
			        <div class="modal-dialog">
			        
			        
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                    <h4 class="modal-title" id="purchaseLabel">Delete</h4>
			                </div>
			                <div class="modal-body">
			          
					  
				
									
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								<input type='hidden' name='userid' value='<?php echo $id;?>'>
								<!--<input type='submit' name='sendEmail' class="btn btn-primary" value='Send Email'>!-->
			                    <a href='Trigger.php?type=<?php echo $table;?>&id=<?php echo $ColId;?>' class="btn btn-primary" >Yes </a>
			                </div>
			            </div>
			            
			           
			        </div>
			    </div>
<?php
}
function LoadTOPMenuLink()
{
?>
<div class="pull-right box-tools">
                                        <a data-original-title="Add New"  href="dashboard.php?page=<?php echo $_GET['page']; if(isset($_GET['type'])) { ?>&type=<?Php echo $_GET['type']; } ?>&view=add" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Add New"><i class="fa fa-plus"></i></a>
                                        <button data-original-title="Reload" class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title=""><i class="fa fa-refresh"></i></button>
                                        <button data-original-title="Collapse" class="btn btn-danger btn-sm" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                                        <button data-original-title="Remove" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>

								    </div>
									
									<?php

}

function LoadPopImg($ColId,$table)
{
$file_full=$_SERVER['DOCUMENT_ROOT'].'/admin/seo_images/'.$table.'/'.$ColId.'.jpg';
if(is_file($file_full))
{
$name='admin/seo_images/'.$table.'/'.$ColId.'.jpg';
$class='info';
$title='Click Here To View Image';
}
else
{
$file_full_png=$_SERVER['DOCUMENT_ROOT'].'/admin/seo_images/'.$table.'/'.$ColId.'.png';
if(is_file($file_full_png))
{
$name='admin/seo_images/'.$table.'/'.$ColId.'.png';
$class='info';
$title='Click Here To View Image';
}
else
{
$class='danger';
$title='Image Not Available.';
}
}

?>

<a href='#' data-toggle="modal" class='btn btn-<?php echo $class;?>  btn-sm' data-target="#myModal<?php echo'Pop'.$ColId.$table;?>" Title='<?php echo $title;?>'><i class="fa fa-fw fa-picture-o"></i></span></a>

			    <div class="modal fade" id="myModal<?php echo'Pop'.$ColId.$table;?>" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
			        <div class="modal-dialog">
			        
			        
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                    <h4 class="modal-title" id="purchaseLabel"> Image</h4>
			                </div>
			                <div class="modal-body" style="text-align: center;">
			            
					  <?php
					  

if($name!='')
{
?>
<img src='<?php echo site_root.$name;?>' style='width: 50%;'>
<?php
}
else
{
?>
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <b>Error!</b> Image Not Available.
                                    </div>
<?php
}
?>
				
									
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type='hidden' name='userid' value='<?php echo $id;?>'>
								<!--<input type='submit' name='sendEmail' class="btn btn-primary" value='Send Email'>!-->
			                    
			                </div>
			            </div>
			            
			           
			        </div>
			    </div>

<?php

}

function Get_table_view($table,$extra=null,$extraLink=null,$notIMPCol=null,$DefaultOpotion_LINK_display=null,$topLink=null)
{
global $db;
if($DefaultOpotion_LINK_display==null)
{
$DefaultOpotion_LINK_display=null;
}
if($notIMPCol==null)
{
$notIMPCol=array();
}

$columns = $db->get_results("SHOW FULL COLUMNS FROM $table");

$ColCount=count($columns);

if(isset($_GET['Col']))
{
$connectQuery="WHERE ".$_GET['Col']."=".$_GET['Colid'];
}
else
{
$connectQuery='';
}
	$tags=$db->get_results("SELECT * FROM $table $connectQuery");
	$tableCol = $db->get_row("SHOW FULL COLUMNS FROM $table");
	$tableColumn=$tableCol->Field;
	//echo GetCount('Tag','WebsiteID');
	
	if($tags)
	{
	?>
	  <div class="box-header">
								
								<?php if($DefaultOpotion_LINK_display==null && $topLink==null){ ?>
								
								<?php
									echo LoadTOPMenuLink();
								}
								elseif($table=='Website')
								{
								echo LoadTOPMenuLink();
								}
								elseif($table=='Tag')
								{
								echo LoadTOPMenuLink();
								}


								?>
								
								
								
                                    <h3 class="box-title"><?php echo $table;?></h3>
									
									
									
								
									
                                </div><!-- /.box-header -->
										
										 <div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php
												$dir= $_SERVER['DOCUMENT_ROOT'].'/admin/seo_images/'.$table.'/';
												$no='';
												foreach($columns as $col)
												{
												$no+=1;
												if(in_array($col->Field,$notIMPCol))
												{
												
												}
												else
												{
												
												$pos = strpos($col->Field, "_t");
												//$id = strpos($col->Field, "_id");
												//$count= GetCount('Tag',$col->Field);
												
												if ($tableColumn==$col->Field)
													{
													$colName=$col->Comment;
													$colName=explode('|',$colName);
													$colName=$colName[0];
													echo'<th>'.$colName.'</th>';
												}
												
												if ($pos)
													{
													$colName=$col->Comment;
													$colName=explode('|',$colName);
													$colName=$colName[0];
													echo'<th>'.$colName.'</th>';
												}
												
												if($no==3)
												{
												if(is_dir($dir))
												{
													echo'<th> Image</th>';
												}
												else
												{
												//	echo'<th>Not True</th>';
												}
												}
												if($extra!=null && in_array($col->Field,$extra))
												{
												if($col->Comment=='')
												{
												$colName=$col->Field;
												}
												else
												{
												$colName=$col->Comment;
												$colName=explode('|',$colName);
												
												$colName=$colName[0];
												}
												echo'<th>'.$colName.'</th>';
												
												
												
										
												
												}
	
		//     trace square for ggetting other tabel data.
		if($extra!=null)
		{
												foreach($extra as $ext)
												{
														$square=explode('[',$ext);
														$realColname=$square[0];
														$colEnd=end($square);
														$square1=explode(']',$colEnd);
														$squCount=count($square);
												
												//print_r($square);
												if($squCount==2)
												{
													$square1=explode('.',$square1[0]);
															
													$tablename=$square1[0];
													$viewcolname=$square1[1];
													if($col->Field==$realColname)
													{
														$getCOl= $db->get_row("SHOW FULL COLUMNS FROM $tablename ");
													$tabelCol=$getCOl->Comment;
													echo'<th>'.$col->Comment.'</th>';
													}
													else
														{
															//echo'<th>'.$realColname.'sdfgh'.$col->Field.'=='.$realColname.'</th>';
														}
												}
												}
												
		}
											
												
												
												
												}
												
												if($col->Comment=='Status')
												{
												echo'<th>Status</th>';
												}
												
												if($no==$ColCount)
												{
													echo'<th>Option</th>';
													
												}
												}
												?>

                                            </tr>
                                        </thead>
                                        <tbody>
										
										
										
										
										<?php
										
											
foreach($tags as $tag)
{
$no='';
?>
<tr>

<?php
foreach($columns as $col)
{

$no+=1;
if($col->Field==$tableColumn)
{
$pos = strpos($col->Field, "_t");
//$id = strpos($col->Field, "_id");
 $field= $col->Field;
 $ColId=$tag->$field;
 }
if(in_array($col->Field,$notIMPCol))
												{
												
												}
												else
												{


$pos = strpos($col->Field, "_t");
//$id = strpos($col->Field, "_id");
 $field= $col->Field;


if($col->Field==$tableColumn)
{
 echo'<td>'.$tag->$field.'</td>';
 $ColId=$tag->$field;
}




												
												
												
												


	 if ($pos)
	 {
		
		 echo'<td>'.$tag->$field.'</td>';
		 }
		 else
		 {
		 // echo'TNOt macth'.$col->Field.'<br />';
		
		 
		 }
												if($no==3)
												{
												if(is_dir($dir))
												{
													echo'<td>';
													echo LoadPopImg($ColId,$table);
													echo' </td>';
												}
												else
												{
													//echo'<th>Not True</th>';
												}
												}
		 
		if($extra!=null && in_array($col->Field,$extra))
		 {
	if($tag->$field!='')
	{
	$totalCount = strpos($tag->$field, ",");
	if($totalCount)
	{
		  $totalCount=explode(',',$tag->$field);
		  $totalCount=count($totalCount);
		  echo'<td>'.$totalCount.'</td>';
		  }
		  else
		  {
		  
		  	  echo'<td>'.$tag->$field.'</td>';
		  }
		  
		  
		  
		  
		  }
		  else
		  {
		   echo'<td></td>';
		  }
		  }
		else
		{
				//     trace square for ggetting other tabel data.
				if($extra!=null){
												foreach($extra as $ext)
												{
														$square=explode('[',$ext);
														$realColname=$square[0];
														$colEnd=end($square);
														$square1=explode(']',$colEnd);
														$squCount=count($square);
												
												//print_r($square);
												if($squCount==2	)
												{
													$square1=explode('.',$square1[0]);
													$tablename=$square1[0];
													$viewcolname=explode(',',$square1[1]);
													$getCOl= $db->get_row("SHOW FULL COLUMNS FROM $tablename ");
													$tabelRelId=$getCOl->Field;
													//print_r($getCOl);
												if($tag->$realColname!='')
												{
												//echo $tablename,$tabelRelId.'='.$tag->$realColname;
													$data=get_row($tablename,$tabelRelId.'='.$tag->$realColname);
													
													}
														if($col->Field==$realColname)
														{
															if($tag->$realColname!=0 && $tag->$realColname!='') 
															{
																if(@$data->$tabelRelId!='')
																{
													echo'<td>';
													foreach($viewcolname as $col)
													{
													echo @$data->$col.' ';
													}
													echo'</td>';
																}
																else
																	{
													echo'<td><code>Data Not Availabel.</code><a data-original-title="You have deletd row in '.$tablename.' table. " data-toggle="tooltip" title="" ><i class="fa fa-fw fa-comment"></i></a></td>';
																	}
															}
															else
																{
																	//echo'<td><code><a title="User not selected  value of '.$tablename.' , When user added new record of '.$table.' ."  ><i class="fa fa-fw fa-bug"></i></a></code></td>';
																echo'<td></td>'; 
															}
														}
												
												}
												}
				}
			}
		  
	
		 
}

	  if(@$col->Comment=='Status')
			{
			$stas=$tag->$field;
			}
			
			
			if(@$col->Comment=='Status')
			  {
			echo '<td>';

			echo StatusTable($ColId,$stas);
			echo'</td>';
			}
			
		  if($no==$ColCount)
			{
			echo'<td>';
			echo LinkTable($ColId,$extraLink,$DefaultOpotion_LINK_display,$table);
			echo'</td>';
			
			  
			}

								
		}	
		 ?>
		  </tr>
		  <?php	
		}
		
		?>
										
										
                                        </tbody>
                             </table>
							 
							 </div>
	<?php
	
}
else
{
?>
<div class="box-body">
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <b>Alert!</b> Data Not Available.
                                    </div>
                                    </div>
									<?php
									if($DefaultOpotion_LINK_display==null && $topLink==null){
									?>
									<a data-original-title="Add New"  href="dashboard.php?page=<?php echo $_GET['page']; if(isset($_GET['type'])) { ?>&type=<?Php echo $_GET['type']; }?>&view=add" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Add New"><i class="fa fa-plus"></i> Add New</a>
									<?php } ?>
<?php
}

}


function StatusTable($colID,$status)
{
//echo $colID.'Status:'.$status;

if($status=='1')
{
?>
<span class='label label-success'>Publish</span>
<?php
}
else
{
?>
<span class='label label-danger'>Unpublish</span>
<?php
}
?>

<?php
}
function ImagePath($ColId,$table)
{
$file_full=$_SERVER['DOCUMENT_ROOT'].'/admin/seo_images/'.$table.'/'.$ColId.'.jpg';
if(is_file($file_full))
{
$name='admin/seo_images/'.$table.'/'.$ColId.'.jpg';
$class='info';
$title='Click Here To View Image';
}
else
{
$file_full_png=$_SERVER['DOCUMENT_ROOT'].'/admin/seo_images/'.$table.'/'.$ColId.'.png';
if(is_file($file_full_png))
{
$name='admin/seo_images/'.$table.'/'.$ColId.'.png';
$class='info';
$title='Click Here To View Image';
}
else
{
$class='danger';
$title='Image Not Available.';
}
}

return $name;
}


function LinkTable($ColId,$extraLink=null,$DefaultOpotion_LINK_display=null,$table)
{
global $db;
//global $ColId;
if($DefaultOpotion_LINK_display==null)
{
?>
<a data-original-title="Edit " href="dashboard.php?page=<?php echo $_GET['page']; if(isset($_GET['type'])) { ?>&type=<?php echo $_GET['type']; } ?>&view=add&id=<?php echo $ColId;?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
<?php
}
if($extraLink!=null)
{
foreach($extraLink as $link)
{
	
	$function= explode(')',$link);
	$functionCOunt=count($function);
	if($functionCOunt==2)
	{
		$function=str_replace('(','',$function[0]);
		$function=str_replace('GETID','',$function);
		echo $function($ColId);
		//echo my($ColId)	;
}
else{
$linkView=str_replace('GETID',$ColId,$link);
echo $linkView;
}
}
}
echo DeleteModal($ColId,$table);

}