<?php
	session_start();
	include "connect.php";
	$conn=connect();
$value=[];
$error=[];

if(isset($_SESSION['error'])) 
	$error=$_SESSION['error'];
if(isset($_SESSION['value']))
	$value=$_SESSION['value'];

try{
	$sql="delete from rides where date < current_date() OR (date=current_date() AND time < current_time())";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
}
catch(PDOException $e)
{
	echo $e->getmessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.navbar-header img{
			height: 100px;
			width: 100px;
			
			
			border-radius: 80px;
		}
		
		.navbar ul li{
			padding: 20px 20px;
		}
		.navbar .navbar-right{
			margin-right: 30px;
		}
		.navbar{
			padding: 5px;
			opacity: .6;
			background-color: none;
		}
		.title h2{
			font-size: 40px;
			margin-top: 30px;
			font-family: impact;
			color: #4d0000;
		}
		.upper{
			background-image: url(bgimg1.png);
			background-size: 100%;
			padding: 10px 10px;
			height: 650px;
		}
		.mid h1{
			font-size: 50px;
			font-family: fantasy;
		}
		.mid{
			padding: 30px;
		}
		
		.navbar .nav .btn{
			padding-left: 30px;
			padding-right: 30px;
			color: #996433;
			border-color: #996433;
		}
		.navbar-brand{
			border: none;
		}
		.middle{
			padding-top: 30px;
			
		}
		#mid-head{
			text-align: center;
			font-family: 
			background-color: #e6f3ff;
		}
		p{
			font-size: 20px;
			text-align: center;
		}
		/*.row1{
			padding-top: px;
		}
		.row2{
			padding-top: px;
		}*/
		.midimg1{
			width: 300px;
			height: 300px;
		}
		/*.middle .row{
			padding: 10px;
			margin: 10px 10px;
		}*/
		h2{
			color: #4d0000;
			font-family: cursive;
		}
		
		.middle .row1 p{
			background-color: white;
		}
		#formlogin{
			display: none;
		}
		#formlogin button{
			background-color: #4d0000;
			color: white;
			font-family: helvetica;
		}
		#formlogin a{
			color: #4d0000;
		}

	</style>
</head>
<body>
	<div class="container-fluid upper">
		<div class="col-md-12">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<ul class="nav navbar-nav">
					<li><a><img src="logo1.jfif"></a></li>
					<li><a href="" class="title"><h2>Commute Together</h2></a></li>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right" id="toplist">
					<li><a class="btn btn-default" onclick="loginform();">Login</a></li>
					<li><a class="btn btn-default" href="signup.php">Sign Up</a></li>
				</ul>
				<div class="nav navabr-nav navbar-right" id="formlogin">
					<form class="form-inline" action="loginuser.php" method="POST">
						<div class="form-group">
							<label>Email</label>
							<input type=text name="email" class="form-control" value="<?php if(isset($value['email'])) echo $value['email'] ?>">
							<span style="color: red; display: block;"><?php if(isset($error['email'])) echo $error['email']?></span>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password">
							<!-- <span style="display: block; color: #4d0000;"><a href="forgotpass.php">Forgot Password</a></span> -->
							<span style="color: red; display: block;"><?php if(isset($error['password'])) echo $error['password']?></span>
						</div>
						<button type="submit" class="btn">Login</button>
						<div class="form-group">
							<a href="" class="form-control" onclick="">Cancel</a>
						</div>
						<div class="col-md-5"></div>
						<div class="col-md-6">
							<span style="display: block; color: #4d0000;"><a href="forgotpass.php">Forgot Password</a></span>
						</div>
					</form>
				</div>
			</div>
		</nav>
		</div>
		<?php
		if(isset($_SESSION['flash']))
			$flash=$_SESSION['flash'];
	?>
	<div class="row alert alert-<?php if(isset($flash)) echo $flash['level'];?>" style="text-align: center;">
		<strong><?php if(isset($flash)) echo $flash['message'];?></strong>
	</div>

		<div class="row row1">
		<div class="col-md-4"></div>
		<div class="col-md-4 mid">
			<h1 style=""><i>Stay Flexible, Travel Together</i></h1>
		</div>
		</div>

		<div class="row row2">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<a class="btn btn-lg btn-info btn-block" href="signup.php">Sign Up</a>
			</div>
		</div>
	</div>


	<div class="container-fluid middle">

		<div class="row row1">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<p id="mid-head"><h3><b>Commute Together is the smart and flexible carpooling service for your commute.</b><h3></p>
<p>Just enter your ride - our intelligent technology finds the perfect match. Save time, share costs and act sustainably with your daily ridesharing service.</p>
		</div>
		</div>
		

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-6">
					<img src="searchimg.jpg" class="midimg1">
				</div>
				<div class="col-md-6">
					<h2><b>Let us know where you want to go</b></h2>
					<p>
Just a few clicks, and you are ready to Commute Together: Drivers and passengers each enter their preferred starting point, destination and time of arrival. Commute Together saves all your settings to make your next ride even easier.
					</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-6">
					<h2><b>Commute Together finds the perfect match</b></h2>
					<p>
This is where our smart system comes in: By analysing rides from all users, Commute Together shows all people going on your destination from your point, and then you can contact the person of your choice and commute together.
					</p>
				</div>
				<div class="col-md-6">
					<img src="findimg.png">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-6">
					<img src="ride2img.png" class="midimg1">
				</div>
				<div class="col-md-6">
					<h2><b>You're ready to Commute Together!</b></h2>
					<p>
Just sit back and enjoy the shared ride. Enter your preferred starting point, destination and time of arrival to create your ride and to search for your partner. Lets Go!!
					</p>
				</div>
			</div>
		</div>


	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
</body>
<script type="text/javascript">
	function loginform()
	{
		var x=document.getElementById("toplist");
		x.style.display="none";
		var y=document.getElementById("formlogin");
		y.style.display="block";
	}
	function hidelogin()
	{
		var x=document.getElementById("formlogin");
		x.style.display="none";
		var y=document.getElementById("toplist");
		y.style.display="block";
	}
</script>
<?php 
unset($_SESSION['error']);
unset($_SESSION['value']);
?>
<?php unset($_SESSION['flash'])?>
</html>