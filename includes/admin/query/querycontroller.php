<?php

$admin = new Admin();

$view = $_GET['file'];


$admin = new Admin;

if(isset($_POST['add_admin']))
{
//$admin->addAdmin();
$admin->addAdmin2();
}

if(isset($_POST['edit_admin']))
{
	$admin->editAdmin();
}

if(isset($_GET['id'])){
$adminid = $_GET['id'];
$admin->setAdminID($adminid);
	
}
$admininfo = $admin->getAdmin();

?>