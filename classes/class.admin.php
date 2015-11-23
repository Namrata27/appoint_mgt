<?php
class Admin
{
	
	public $adminid = 0;
	public $status = 0;
	
	
	function setAdminID($admin){
	$this->adminid = $admin;
	}
	
	function getAdmin(){
		global $db;
		
		
		if($this->adminid != 0){
		$getadmin = $db->get_row("SELECT * FROM admin WHERE admin_id='$this->adminid'");
		} else {
			
			$getadmin = $db->get_results("SELECT * FROM admin");
			
		}
		
		return $getadmin;
	}
	
	
	
	function deleteAdmin(){
		global $db;
		$getadmin = $db->get_row("DELETE FROM admin WHERE admin_id='$this->adminid'");
		return $getadmin;
	}
	
	function setStatus($newstatus){
		$this->status = $newstatus;
		
		
	}
	
	
	function getCustomers(){
		global $db;
		$getadmin = $db->get_results("SELECT * FROM customers WHERE cust_admin_id='$this->adminid' AND cust_status='$this->status'");
		return $getadmin;
	}
	
/*
	function addAdmin(){
	print_r($_POST);
		global $db;
		
		$count = count($_POST);	
			$string = '';
			$i=1;
		foreach($_POST as $key=>$value){
		if($key == 'admin_password'){
			$value = md5($value);
		}
		
		if($i != $count){
			$string .="'".$value."'".",";
		}
		$i++;
		}
		$trimmed = rtrim($string,',');
		$add = $db->query("INSERT INTO admin VALUES ('', $trimmed)");
		$db->debug();
		
		
		
	}
*/
	
	function addAdmin2(){
		
		print_r($_POST);
		global $db;
		
		$count = count($_POST);	
			$string = '';
		
		$keys='';
		$values='';
			$i=1;
		foreach($_POST as $key=>$value){
		if($key == 'admin_password'){
			$value = md5($value);
		}
		
		
		if($i != $count){
			$keys .=$key.",";
			$values .="'".$value."'".",";
		}
		$i++;
		}
		$trimmed = rtrim($values,',');
		$trim_keys = rtrim($keys,',');
		
		$add = $db->query("INSERT INTO admin ($trim_keys) VALUES ($trimmed)");
		$db->debug();
		}
	
	function editAdmin(){
		
			print_r($_POST);
		global $db;
		
		$count = count($_POST);	
			$string = '';
		
		$keys='';
		$values='';
			$i=1;
		foreach($_POST as $key=>$value){
		if($key == 'admin_password'){
			$value = md5($value);
		}
		
		
		if($i != $count){
			$keys .=$key."="."'".$value."'".",";
		}
		$i++;
		}
		$trimmed = rtrim($values,',');
		$trim_keys = rtrim($keys,',');
		
		$add = $db->query("UPDATE admin SET $trim_keys WHERE admin_id='$this->adminid'");
		$db->debug();
		
		
		
		
	}
	
}


