<?php
	session_start();
	
	
	$userid=$_SESSION['_login'];
	include "userpageheader.php";

	$sql="select * from rides where id=:u";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':u',$userid);
	$stmt->execute();

	$myride=$stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.panel-heading h4{
			color: #4d0000;
			font-family: verdana;
		}
		.panel-body{
			color: #4d0000;
		}
		.panel-body li{
			font-size: 20px;
		}
		i{
			color: #4d0000;
			
		}
		
		a{
			color: red;
		}
		#homelink{
			box-shadow: 0px 0px 0px;
		}
		#createridelink{
			box-shadow: 0px 0px 0px;
		}
		#searchlink{
			box-shadow: 0px 0px 0px;
		}
		#myrideslink{
			box-shadow: 1px 1px 5px;
		}
	</style>
</head>
<body>
	<?php
		if($stmt->rowCount()>0)
		{
		foreach($myride as $r)
		{
	?>
	<div class="container">
		<div class="col-md-6">
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h4><strong><?php echo strtoupper($r['origin']);?> <i class="fa fa-arrow-circle-right" style="color: #4d0000;"></i> <?php echo strtoupper($r['destination']);?></strong></h4>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
				<ul>
					<li><h5><span class="label" style="background-color: #4d0000; font-size: 18px;">Date: </span></h5><?php echo $r['date']?></li>
					<li><h5><span class="label" style="background-color: #4d0000; font-size: 18px;">Time: </h5><?php echo $r['time']?></span></h5></li>
					<li><h5><span class="label" style="background-color: #4d0000; font-size: 18px;">As: </h5><?php echo ucfirst($r['rideas']);?></span></h5></li>
				</ul>
				</div>
				<div class="col-md-4">
					<a href="<?php echo "removeride.php"."?remove=".$r['rideid'];?>" class="btn"><i class="fa fa-trash" style="color: #4d0000; font-size: 30px; display: block;"></i>DELETE</a>
				</div>
			</div>
		
		</div>
	</div>
	</div>
<?php }
}
else
{
?>
<div class="col-md-4"></div>
<div class="panel panel-default col-md-4">
	<div class="panel-heading">
		<h3>No Rides</h3>
	</div>
	<div class="panel-body">
		
		<p style="text-align: center;">
			<a href="createride.php"><i class="fa fa-plus-circle" style="font-size: 80px;"></i></a>
			<h3 style="color: #4d0000; text-align: center; font-family: verdana;"><strong>Create Ride</strong></h3></span>
		</p>
	</div>
</div>
<?php
}
?>
</body>

</html>