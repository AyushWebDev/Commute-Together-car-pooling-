<?php
	include "connect.php";
	include "helper.php";
	$conn=connect();

	$del=$_GET['remove'];
	$sql="delete from rides where rideid=:id";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':id',$del);
	$stmt->execute();
	flash("info","ride removed");
	header("location: myride.php");
?>