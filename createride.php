<?php
session_start();
	include "userpageheader.php";
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
		.formsectionhead{
			color: #4d0000;
			text-shadow: 1px 1px 3px;
		}
		#formcontainer{
			padding: 20px;
			padding-bottom: 50px;
			box-shadow: 2px 2px 8px #4d0000;
			margin: 20px;
		}
		.submitbut{
			background-color: #4d0000;
			color: white;
		}
		.panel{
			margin: 20px 20px;
		}
		.panel-body span{
			color: red;
		}
		#createridelink{
			box-shadow: 1px 1px 5px;
		}
		#homelink{
			box-shadow: 0px 0px 0px;
		}
		#searchlink{
			box-shadow: 0px 0px 0px;
		}
		#myrideslink{
			box-shadow: 0px 0px 0px;
		}
	</style>
</head>
<body>
	<!-- <div class="col-md-3"></div> -->
 	<div class="col-md-2"></div> 
	
	<div class="col-md-8 block">
		<form action="createrideuser.php" method="POST" id="formcontainer">
			<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">New Ride As</h3></div>
				<div class="panel-body">
					<label class="radio-inline" style="font-family: verdana;">
						
						<input type="radio" name="rideas" value="driver">Driver
					</label>
					<label class="radio-inline">
						
						<input type="radio" name="rideas" value="passenger">Passenger
					</label>
					<label class="radio-inline">
						
						<input type="radio" name="rideas" value="either">Either
					</label>
					<span><?php if(isset($error['rideas'])) echo $error['rideas'];?></span>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">Your Country</h3></div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" name="country" placeholder="Enter Your Country" value="<?php if(isset($value['country'])) echo $value['country']?>" class="form-control">
						<span><?php if(isset($error['country'])) echo $error['country'];?></span>
					</div>
				</div>
			</div>

			

			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">City</h3></div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" name="city" placeholder="Enter Your City" value="<?php if(isset($value['city'])) echo $value['city']?>" class="form-control">
						<span><?php if(isset($error['city'])) echo $error['city'];?></span>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">Date of Journey</h3></div>
				<div class="panel-body">
					<div class="form-group">
						<input type="date" name="date" value="<?php if(isset($value['date'])) echo $value['date']?>" class="from-control">
						<span><?php if(isset($error['date'])) echo $error['date'];?></span>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">Travel From</h3></div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" name="from" placeholder="From" value="<?php if(isset($value['from'])) echo $value['from'];?>" class="form-control">
						<span><?php if(isset($error['from'])) echo $error['from'];?></span>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">Travel To</h3></div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" name="to" placeholder="To" value="<?php if(isset($value['to'])) echo $value['to'];?>" class="form-control">
						<span><?php if(isset($error['to'])) echo $error['to'];?></span>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="formsectionhead">Departure Time</h3></div>
				<div class="panel-body">
					<div class="form-group">
						<input type="time" name="time" value="00:00:00" class="form-control">
					</div>
					<span><?php if(isset($error['time'])) echo $error['time'];?></span>
				</div>
			</div>

			<div class="col-md-6">
		
				<button type="submit" class="btn btn-default btn-block">
					Cancel
				</button>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-block submitbut" style="color: white;">
					Save
				</button>
			</div>
		</div>
		</form>
	</div>
</body>
<?php
unset($_SESSION['error']);
unset($_SESSION['value']);
?>
</html>