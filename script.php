<?php

include('connection.php');
include("includes/function.php");
if(isset($_POST['bac_id']))
{
$bac_id= $_POST['bac_id'];
$delete= $db->query("DELETE FROM batch_additional_charges WHERE bac_id='$bac_id'");
if($delete)
{
?>
<br /><br />
<span class='label label-info' id='animate1'>Successfully Delete Additional Charges</span>
<br />
<?php
}
}

if(isset($_POST['batch_id']))
{

if(isset($_POST['bac_desc']) && isset($_POST['bac_amt']) || isset($_POST['batch_id']))
{


$batch_id= $_POST['batch_id'];
if(isset($_POST['batch_id']) && isset($_POST['camper_id']))
{
$camper_id= $_POST['camper_id'];
$batch_camper_ref= get_row('participant_batch','pb_p_id='.$camper_id.' AND pb_b_id='.$batch_id);
}
if(isset($_POST['bac_desc']) && isset($_POST['bac_amt']))
{
$bac_desc= $_POST['bac_desc'];
$camper_id= $_POST['camper_id'];
$typeCharge= $_POST['typeCharge'];
$bac_amt= $_POST['bac_amt'];
$typeCharge= $_POST['typeCharge'];
}

//typeCharge=1-----> - amount
//typeCharge=2-----> + amount
if(isset($_POST['bac_amt']))
{

$insert= $db->query("INSERT INTO batch_additional_charges VALUES('','$batch_id','$batch_camper_ref->participant_batch_id','$bac_desc','$bac_amt','$typeCharge')");

if($insert)
{
?><br />
<span class='label label-primary' id='animate1'>Success: Add New Discount / Charges</span><br /><br />

<?Php
}
}


}
}