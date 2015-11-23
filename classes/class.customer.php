<?php
class Customer
{
		public $custid=0;
		
		public $status=0;
		
		function setCustomerID($customer_id)
		{
			$this->custid = $customer_id;
			
		}
		
		function getCustomer()
		{
			global $db;
		if($this->custid != 0)
		{
		$getcustomer = $db->get_row("SELECT * FROM customer WHERE cust_id='$this->custid'");
	//$db->debug();
		}
		 else 
		{
			
			$getcustomer = $db->get_results("SELECT * FROM customer");
			//$db->debug();
			
		}
		
		return $getcustomer;
		}
		function addCustomer(){
		
		global $db;
		
		$count = count($_POST);	
			$string = '';
		
		$keys='';
		$values='';
			$i=1;
		foreach($_POST as $key=>$value){
		
		
		if($i != $count){
			$keys .=$key.",";
			$values .="'".$value."'".",";
		}
		$i++;
		}
		$trimmed = rtrim($values,',');
		$trim_keys = rtrim($keys,',');
		
		$add = $db->query("INSERT INTO customer ($trim_keys) VALUES ($trimmed)");
		//$db->debug();
		}
	
	function editCustomer(){
		
			//print_r($_POST);
		global $db;
		
		$count = count($_POST);	
			$string = '';
		
		$keys='';
		$values='';
			$i=1;
		foreach($_POST as $key=>$value){
		if($i != $count){
			$keys .=$key."="."'".$value."'".",";
		}
		$i++;
		}
		
		$trimmed = rtrim($values,',');
		
		$trim_keys = rtrim($keys,',');
		
		$add = $db->query("UPDATE customer SET $trim_keys WHERE cust_id='$this->custid'");
		//$db->debug();
		
		
		
		
	}
		
		
}






?>