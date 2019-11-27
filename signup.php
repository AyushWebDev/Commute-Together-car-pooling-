<?php
session_start();
$value=[];
$error=[];

if(isset($_SESSION['error']))
	$error=$_SESSION['error'];
if(isset($_SESSION['value']))
	$value=$_SESSION['value'];
include "header.php"; 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.radio-inline{
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.submitbut{
			background-color: #4d0000;
			color: white;
		}
		.submitbut:hover{
			color: white;
		}
		
		body{
			background-color: #f2f2f2;
		}
		/**/
		.headbutton{
			margin-bottom: 10px;
			/*border-bottom: 1px solid;*/
			opacity: .8;
			
			font-family: helvetica;
		}
		.headbutton:hover{
			font-size: 20px;
		}
		#headbutton1
		{
			
		}
		#headbutton2{
			
			background-color: #4d0000;
			color: white;
			box-shadow: 2px 2px 2px#4d0000;
		}
		.formcontainer{
			
			box-shadow: 8px 8px #bfbfbf;
			padding: 20px 20px;
			background-color: white;
		}
		#form-signin{
			display: none;
		}
	</style>

</head>
<body>
	<div class="col-md-4"></div>
	<div class="col-md-4 formcontainer">
		<div class="col-md-6 btn headbutton" id="headbutton1" onclick="signupForm();">Sign Up</div>
		<div class="col-md-6 btn headbutton" id="headbutton2" onclick="signinForm();">Sign In</div>

		<form id="form-signup" action="signupuser.php" method="POST"> 
			<div class="form-group">
				<input type="text" name="firstname" placeholder="Enter Your Firstname" class="form-control" value="<?php if(isset($value['firstname'])) echo $value['firstname']?>">
				<span style="color: red;"><?php if(isset($error['firstname'])) echo $error['firstname']?></span>
			</div>

			<div class="form-group">
				<input type="text" name="lastname" placeholder="Enter Your Lastname" class="form-control" value="<?php if(isset($value['lastname'])) echo $value['lastname']?>">
				<span style="color: red;"><?php if(isset($error['lastname'])) echo $error['lastname']?></span>
			</div>

			<div class="form-group">
				<input type="text" name="email" placeholder="Enter Your Email" class="form-control" value="<?php if(isset($value['email'])) echo $value['email']?>">
				<span style="color: red;"><?php if(isset($error['email'])) echo $error['email']?></span>
			</div>

			<label class="radio-inline">
				<input type="radio" name="gender" value="male">Male
			</label>

			<label class="radio-inline">
				<input type="radio" name="gender" value="female">Female
			</label>
			<span style="color: red;"><?php if(isset($error['gender'])) echo $error['gender']?></span>
			<div class="form-group">
				<input type="password" name="password" placeholder="Enter Your Password" class="form-control">
				<span style="color: red;"><?php if(isset($error['password'])) echo $error['password']?></span>
			</div>

			<div class="form-group">
				<input type="text" name="contact" placeholder="Enter Your Contact" class="form-control" value="<?php if(isset($value['contact'])) echo $value['contact']?>">
				<span style="color: red;"><?php if(isset($error['contact'])) echo $error['contact']?></span>
			</div>

			<button type="submit" class="btn btn-block submitbut">
				Finish
			</button>
		</form>

		<form id="form-signin" action="loginuser.php">
			<div class="form-group">
				<input type="text" name="email" placeholder="Username(Email)" class="form-control">
			</div>

			<div class="form-group">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</div>

			<button type="submit" class="btn btn-block submitbut">
				Sign In
			</button>
		</form>
	</div>


	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
</body>
<script type="text/javascript">
		function signupForm()
		{
			var x=document.getElementById("headbutton2");
			x.style.backgroundColor="#4d0000";
			x.style.color="white";
			x.style.boxShadow="2px 2px 2px#4d0000";
			var y=document.getElementById("form-signup");
			y.style.display="block";
			var z=document.getElementById("form-signin");
			z.style.display="none";
			var w=document.getElementById("headbutton1");
			w.style.backgroundColor="white";
			w.style.color="black";
			w.style.boxShadow="none";
		}
		function signinForm()
		{
			var x=document.getElementById("headbutton1");
			x.style.backgroundColor="#4d0000";
			x.style.color="white";
			x.style.boxShadow="2px 2px 2px#4d0000";
			var y=document.getElementById("form-signin");
			y.style.display="block";
			var z=document.getElementById("form-signup");
			z.style.display="none";
			var w=document.getElementById("headbutton2");
			w.style.backgroundColor="white";
			w.style.color="black";
			w.style.boxShadow="none";
		}
	</script>
	<?php 
unset($_SESSION['error']);
unset($_SESSION['value']);
?>
</html>