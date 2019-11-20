<?php
	session_start();

	include "userpageheader.php";
	include "helper.php";
	$conn=connect();
	$error=[];
	$value=[];
	$userid=$_SESSION['_login'];
	

	
	$_POST['date']=trim($_POST['date']);
	$_POST['from']=trim($_POST['from']);
	$_POST['to']=trim($_POST['to']);
	

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		

		


		if(empty($_POST['date']))
		{
			$error['date']="*Date is required";
		}
		else
		{
			if($_POST['date']<date("Y-m-d"))
				$error['date']="Invalid Date";
			else
				$value['date']=$_POST['date'];
		}



		if(empty($_POST['from']))
		{
			$error['from']="*Enter Your Place of origin";
		}
		else
		{
			if(!preg_match("/^[a-z A-Z0-9]+$/",$_POST['from']))
				$error['from']="Invalid PLACE";
			else
				$value['from']=$_POST['from'];
		}


		if(empty($_POST['to']))
		{
			$error['to']="*Enter Your Destination";
		}
		else
		{
			if(!preg_match("/^[a-z A-Z]+$/",$_POST['to']))
				$error['to']="Invalid PLACE";
			else
				$value['to']=$_POST['to'];
		}


		
	}
	else {
		flash('danger','Something went wrong');
		header("location:createride.php");
	}

	if(count($error)>0)
	{
		$_SESSION['error']=$error;
		$_SESSION['value']=$value;
		header("location: search.php");
		die();
	}
	
		try{
			$sql="select rides.*,user.firstname,user.lastname,user.email,user.contact from rides natural join user where origin=:from and destination=:to and date=:date";
			$stmt=$conn->prepare($sql);
			$stmt->execute($value);


			$ridesAvail=$stmt->fetchAll();

			

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
	<style type="text/css">
		.head h3{
			color: #4d0000;
			font-family: verdana;
			text-align: center;
		}
		.main{
			margin: 10px;
			box-shadow: 1px 1px 5px #4d0000;
			color: #4d0000;
		}
		.call{
			color: green;
			font-size: 30px;
		}
		.main ul li{
			list-style: none;
			margin: 20px;
		}
		.mail
		{
			color: #c91e2c;
		}
	</style>
</head>
<body>
	<?php
		if($stmt->rowCount()>0)
		{
			foreach($ridesAvail as $r)
			{
	?>
	<div>
		<div class="container">
		<div class="col-md-4"></div>
		<div class="panel panel-default col-md-4 head">
			<div class="panel panel-heading">
				<h3>Rides Available</h2>
			</div>
		</div>
		</div>
		<div class="container">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<h3><?php echo strtoupper($r['origin']); ?><i class="fa fa-arrow-circle-right" style="color: #4d0000;"></i> <?php echo strtoupper($r['destination']); ?></h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-6 main">
			<ul>
				<li><h3><strong><?php echo $r['firstname']." ".$r['lastname'];?></strong></h3></li>
				<li><h4>Departure Time: <?php echo $r['time'];?></h4></li>
				<li><h4> <i class="fa fa-phone call" style="font-size: 25px;"></i> : +91<?php echo $r['contact'];?> </h4></li>
				<li><h4><i class="fa fa-envelope mail" style="font-size: 25px;"></i> : <?php echo $r['email'];?></h4></li>

			</ul>

		</div>
	</div>
<?php }}
else
{
?>
	<div class="container">
		<div class="col-md-4"></div>
		<div class="panel panel-default col-md-4 head">
			<div class="panel panel-heading">
				<h3>No Ride Available</h2>
			</div>
		</div>
		</div>
</body>
<?php }?>
</html>