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
		#homelink{
			box-shadow: 0px 0px 0px;
		}
		#createridelink{
			box-shadow: 0px 0px 0px;
		}
		#searchlink{
			box-shadow: 1px 1px 5px;
		}
		#myrideslink{
			box-shadow: 0px 0px 0px;
		}
		.formsectionhead{
			color: #4d0000!important;
			text-shadow: 1px 1px 3px;
			font-size: 18px;
		}
		.panel{
			font-color: #4d0000;
		}
		button{
			background-color: #4d0000;
			color: white;
		}
		.search:hover{
			background-color: #4d0000;
			color: white;
		}
		#formcontainer{
			padding: 20px;
			padding-bottom: 50px;
			box-shadow: 2px 2px 8px #4d0000;
			margin: 20px;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="formcontainer">
			<form action="showrides.php" method="POST" >
			<div class="panel panel-default col-md-6">
				
				<div class="panel panel-heading formsectionhead">
					Country
				</div>
				<div class="panel panel-body">
					<div class="form-group">
						<input type="text" name="country" placeholder="Country" value="<?php if(isset($value['country'])) echo $value['country']?>">
						<span style="display: block; color: red;"><?php if(isset($error['country'])) echo $error['country'];?></span>
					</div>
				</div>
			</div>
			<div class="panel panel-default col-md-6">
				<div class="panel panel-heading formsectionhead">
					City
				</div>
				<div class="panel panel-body">
					<div class="form-group">
						<input type="text" name="city" placeholder="City" value="<?php if(isset($value['city'])) echo $value['city']?>">
						<span style="display: block; color: red;"><?php if(isset($error['city'])) echo $error['city'];?></span>
					</div>
				</div>
			</div>
			<div class="panel panel-default col-md-6">
				<div class="panel panel-heading formsectionhead">
					Origin
				</div>
				<div class="panel panel-body">
					<div class="form-group">
						<input type="text" name="from" placeholder="From" value="<?php if(isset($value['from'])) echo $value['from']?>">
						<span style="display: block; color: red;"><?php if(isset($error['from'])) echo $error['from'];?></span>
					</div>
				</div>
			</div>
			<div class="panel panel-default col-md-6">
				<div class="panel panel-heading formsectionhead">
					Destination
				</div>
				<div class="panel panel-body">
					<div class="form-group">
						<input type="text" name="to" placeholder="To" value="<?php if(isset($value['to'])) echo $value['to']?>">
						<span style="display: block; color: red;"><?php if(isset($error['to'])) echo $error['to'];?></span>
					</div>
				</div>
			</div>
			<div class="panel panel-default col-md-12">
				<div class="panel panel-heading formsectionhead">
					Date
				</div>
				<div class="panel panel-body">
					<div class="form-group">
						<input type="date" name="date">
						<span style="display: block; color: red;"><?php if(isset($error['date'])) echo $error['date'];?></span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-3">
				<button type="submit" class="btn btn-block search">
					Search
				</button>
			</div>
		</form>
		</div>
	</div>
</body>
</html>