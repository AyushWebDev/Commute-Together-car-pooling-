<?php
session_start();
	include "userpageheader.php";
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		p{
			font-family: verdana;
			
			text-align: center;
			color: #4d0000;
		}
		.panel-heading{
			text-align: center;
			
			color: #4d0000!important;
		}
		.para{
			background-image: url(createride2.jpg);
			padding: 20px;
			opacity: ;
			background-size: 100%;
			font-size: 15px;
		}
		i{
			color: #4d0000;
			
		}
		#createridelink{
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
	<div class="col-md-2"></div>
	<div class="col-md-2"></div>
	<div class="col-md-1"> </div>
	<div class="col-md-2 block">
		<div class="panel panel-default">
			<div class="panel-heading"><h3>Create Ride</h3></div>
		<div class="para panel-body">
		<p>
			To participate in a shared ride,you first create a ride intent to specify the time,starting point,destination,and commuting preferences for your journey.
		</p>
		<p>
			Your ride will be shown in the profiles of other people who will search for the starting point and destination which will match yours. 
		</p>
		<p>
			<a href="createride.php"><i class="fa fa-plus-circle" style="font-size: 80px;"></i></a>
			<h3 style="color: #4d0000; text-align: center; font-family: verdana;"><strong>Create Ride</strong></h3></span>
		</p>
		</div>

		</div>
	</div>
</body>
</html>