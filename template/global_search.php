<?php
include_once($_SERVER['DOCUMENT_ROOT']."/folliage-soft/connection.php");

$search = $_POST['name'];

if($search == ''){
	exit();
	
}

?>

<?php
//Search Batch
$batches = $db->get_results("SELECT * FROM Batch WHERE b_code LIKE '%$search%'");
$count = count($batches);

if($count > 0){ ?>
	<ul class="sidebar-menu">
	<li class="header">Batches</li>
	
<?php foreach($batches as $batch){ ?>
		<li><a href="http://192.168.0.106/folliage-soft/index.php?folder=batchtable&file=topbarbatch&bid=<?php echo $batch->b_id; ?>"><?php echo $batch->b_code; ?></a></li>
		
		
<?php } ?>
</ul>
<?php } ?>



<?php
//Search Batch

$findspaces = explode(" ",$search);
$countspaces = count($findspaces);
if($countspaces > 1){
	//$query = "p_name LIKE '%'"
	$query = "select p_id,p_fname,p_mname,p_lname from participant where (p_fname LIKE '%$findspaces[0]%') AND (p_lname LIKE '%$findspaces[1]%')";
} elseif($countspaces <= 1 && $countspaces > 0){
	$query = "select  p_id,p_fname,p_mname,p_lname from participant where (p_fname LIKE '%$findspaces[0]%') OR (p_lname LIKE '%$findspaces[0]%')";
	
}

$participants = $db->get_results($query);
//$db->debug();
$countparticipants = count($participants);
if($countparticipants > 0){ ?>
	<ul class="sidebar-menu">
	<li class="header">Participants</li>
	
<?php foreach($participants as $participant){ ?>
		<li><a href="http://192.168.0.106/folliage-soft/index.php?folder=participant&file=view&pid=<?php echo $participant->p_id; ?>"><?php echo $participant->p_fname; ?> <?php echo $participant->p_mname; ?> <?php echo $participant->p_lname; ?></a></li>
		
		
<?php } ?>
</ul>
<?php } ?>