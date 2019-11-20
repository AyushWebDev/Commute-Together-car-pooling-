<?php
session_start();
	include "connect.php";
	include "helper.php";
	$conn=connect();

	$del=$_GET['remove'];
	$sql="delete from rides where rideid=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$del);
	$stmt->execute();
	flash("info","Ride Deleted");
	header("location: myrides.php");
?>