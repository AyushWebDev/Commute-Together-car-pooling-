<?php
	include "connect.php";
	$conn=connect();
	if(isset($_SESSION['_login']))
	$userid=$_SESSION['_login'];
	$sql="select count(*) from rides where id=:u";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':u',$userid);
			$stmt->execute();

			$countrides=$stmt->fetch();
			$_SESSION['_countrides']=$countrides;

	$sql="delete from rides where date < current_date() OR (date=current_date() AND time < current_time())";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
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
			
			background-color: none;
		}
		.title h2{
			font-size: 40px;
			margin-top: 30px;
			font-family: impact;
			color: #4d0000;
		}
		.headlist .nav a{
			color: #4d0000!important;
			font-size: 18px!important;
			font-family: verdana!important;
		}
		.headlist .nav a:hover{
			color: #4d0000!important;
			font-size: 15px!important;
			font-family: verdana!important;
			text-decoration: underline;
			box-shadow: 1px 1px 5px;
		}
		#homelink{
			box-shadow: 1px 1px 5px;
		}
		#logout:hover{
			font-size: 13px!important;

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
				 <ul class="nav navbar-nav navbar-right">
					<li>
						<div>
							<span style=""><i class="fa fa-user" style="color: #4d0000; text-align: center; font-size: 20px;"></i></span>
							<label style="color: #4d0000; font-family: verdana; font-size: 18px;"><b>
								<?php
									if(isset($_SESSION['user']))
									{
										$user=$_SESSION['user'];
										echo ucfirst($user['firstname'])." ".ucfirst($user['lastname']);
									} 

								?></b>
							</label>
							
						</div>
					</li>
					<?php
					if(isset($_SESSION['_login']))
					{
					?>
					<li><a href="logout.php" style="color: #4d0000;font-size: 15px; border: solid #4d0000;box-shadow: 1px 1px 5px;" class="btn" id="logout"><i class="fa fa-sign-out" style="color: #4d0000;font-size: 18px;box-shadow: 1px 1px 5px;"></i> LOG OUT</a></li>
					<?php }?>
				</ul>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-6 headlist">
				<ul class="nav navbar-nav">
					<li><a href="userpage.php" id="homelink" class="links">Home</a></li>
					<li><a href="createride.php" id="createridelink" class="links">Create Ride</a></li>
					<li><a href="search.php" id="searchlink" class="links">Search</a></li>
					<li><a href="myrides.php" id="myrideslink" class="links">My Rides-<span style="background-color: #4d0000; font-size: 15px;" class="label label-default"><?php if(isset($_SESSION['_countrides'])){ $ride=$_SESSION['_countrides'];echo $ride['count(*)'];}?></span></a></li>
				</ul>
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
	</div>
	

	<script type="text/javascript">
		
		
	</script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
</body>
<?php

	unset($_SESSION['flash']);
?>
</html>