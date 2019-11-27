<?php
session_start();
	include "header.php";
	$error=[];
	$value=[]; 
	if(isset($_SESSION['error']))
		$error=$_SESSION['error'];
	if(isset($_SESSION['value']))
		$value=$_SESSION['value'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.btn{
			background-color: #4d0000;
		}
		.panel-heading h2{
			color: #4d0000;
			text-shadow: 1px 1px 3px;
		}
	</style>
</head>
<body>
	<div class="col-md-4"></div>
	<div class="col-md-4 panel panel-default">
		<div class="panel-heading">
			<h2>Reset Password</h2>
		</div>
	<form class="panel-body" action="<?php echo "resetpass.php";?>" method="POST">
		
		<div class="form-group">
			<div><input type="text" name="email" placeholder="Enter Email For Verification" class="form-control" value="<?php if(isset($value['email'])) echo $value['email'];?>"></div>
		</div>
		<span style="display: block; color: red;"><?php if(isset($error['email'])) echo $error['email'];?></span>
		<button type="submit" class="btn btn-default" style="color: white;">RESET</button>
	</form>
	</div>
</body>
</html>