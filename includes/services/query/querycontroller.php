<?php
$customer=new Customer();

if(isset($_POST['customer_add']))
{
	$cust_add=$customer->addCustomer();
	if($cust_add)
	{
		$msg="<div class='alert alert-success'>Customer added successfully</div>";
	}
}

if(isset($_GET['id'])){
echo $_GET['id'];
$customerid = $_GET['id'];
$customer->setCustomerID($customerid);
	
}
if(isset($_POST['edit_customer']))
{
	$customer->editCustomer();
}


$customerinfo = $customer->getCustomer();

?>