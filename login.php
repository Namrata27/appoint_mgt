<?php
session_start();
session_destroy();
include($_SERVER['DOCUMENT_ROOT']."/appoint_manager/connection.php");
if(isset($_POST['submit']))
{ 
//print_r($_POST);
	if(isset($_POST['uname']) && isset($_POST['pass']))
	{
		
		$username=$_POST['uname'];
		
		$password=md5($_POST['pass']);
		
	
		 		//echo'12222';
				
			$getadmin = $db->get_row("SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
			//$db->debug();
			if($getadmin)
			{
					session_start();
					
					$_SESSION['admin_id']=$getadmin->admin_id;
					
					$_SESSION['u_name']=$getadmin->admin_name;
					
					header('location:index.php');
					//echo 'true';

		}
		else
		{
			
			global	$msg;
		$msg= " Please enter the valid username & password";
		//echo'dsfsdfdsf';
		}
	
	}

}
//echo'msg'.$msg;
?>
<!--
<link rel="stylesheet" type="text/css" href="add.css"/>

<div class="m">    

<h1>LOGIN FORM </h1>

<form name="form1" method="post" action="">

<div class="a"> <div class="l">User Name</div> <div class="r"><INPUT type="text" name="uname" id="" class=""></div></div>

<div class="a"> <div class="l">Password </div> <div class="r"><INPUT type="password" name="pass" id="" class=""></div></div>

<div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT type="submit" class="" name="submit" value="LOGIN"></div></div>

</form>

</div>

-->

	
         <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Appoint-Manager Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
      <b>Appoint-Manager</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <form method="post">
        	
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name='uname' placeholder="Username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name='pass' placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                                  	<?php
        		
			if(isset($msg))
			{
				echo'<span class="label label-danger">'.$msg.'</span><br /><br />';
			}
			?>
            </div><!-- /.col -->
            <div class="col-xs-4">
          
              <input  type="submit" name='submit' value='Sign In' class="btn btn-primary btn-block btn-flat">
            </div><!-- /.col -->
          </div>
        </form>

                <a href="forgot.php">I forgot my password</a><br>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>