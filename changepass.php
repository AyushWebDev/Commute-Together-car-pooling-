<?php
session_start();
include "header.php";
include "connect.php";
	$email=$_GET['email'];

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
	<form class="panel-body" action="<?php echo "changepassuser.php"."?email=".$email?>" method="POST">
		
		<div class="form-group">
			<div><input type="password" name="password" placeholder="Enter New Password" class="form-control" ></div>
		</div>
		<span style="display: block; color: red"><?php if(isset($error['pass'])) echo $error['pass']?></span>

		<div class="form-group">
			<div><input type="password" name="newpassword" placeholder="Retype New Password" class="form-control"></div>
		</div>
		<span style="display: block; color: red"><?php if(isset($error['newpass'])) echo $error['newpass']?></span>
		<button type="submit" class="btn btn-default" style="color: white;">RESET</button>
	</form>
	</div>
</body>
</html>