<?php
session_start();
include "header.php";
include "connect.php";
	$id=$_GET['u'];
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
	<style>
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
			<h2>Change Password</h2>
		</div>
	<form class="panel-body" action="<?php echo "updatePassuser.php"."?id=".$id?>" method="POST">
		
		<div class="form-group">
			<div><input type="password" name="password" class="form-control" placeholder="Enter New Password"></div>
		</div>
		<span style="display: block; color: red"><?php if(isset($error['pass'])) echo $error['pass']?></span>

		<div class="form-group">
			<div><input type="password" name="newpassword" class="form-control" placeholder="Retype New Password" ></div>
		</div>
		<span style="display: block; color: red"><?php if(isset($error['newpass'])) echo $error['newpass']?></span>
		<button type="submit" class="btn btn-default" style="color: white;">RESET</button>
	</form>
	</div>
</body>
</html>