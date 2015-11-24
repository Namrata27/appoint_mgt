<?php
session_start();

ob_start();


if(isset($_GET['menu']))
{
	$_SESSION['menu']=$_GET['menu'];
}

global $db;

if(!isset($_SESSION['admin_id']))
{
	//print_r($_SESSION);
header('location:login.php');
}
include_once($_SERVER['DOCUMENT_ROOT']."/appoint_mgt/connection.php");
if(isset($_GET['folder']))
{
	$folder=$_GET['folder'];
}
else
{
	$folder='customer';
}

include('includes/Get_table_view.php');

include('includes/function.php');

require_once('classes/class.admin.php');
require_once('classes/class.customer.php');

include_once('includes/'.$folder.'/query/querycontroller.php');


if(!isset($_SESSION['first']))
{
welcome_msg();
$_SESSION['first']='run';
}




include('template/topbar.php');
include('template/left.php');
?>
      <?php 
            if(isset($_GET['folder']))
	  {
		  /*echo'this is folder'.$folder; */
		  ?>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
        
           include_once('includes/'.$folder.'/breadcrumbs.php');
        ?>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
				
                 <?php
				 global $msg;
				 echo $msg;
                 
                 include_once('includes/'.$folder.'/controller.php');

                 ?>
                     </div>
          
    
      
      
        </section>
      </div>
      
      
      
      
      
 <?php

      }
      else
      {
	      
	       echo dashboard(); 
      }
      ?>
        <?php
    include('template/footer.php');
    ?>
















