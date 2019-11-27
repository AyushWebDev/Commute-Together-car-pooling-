<?php
session_start();
include "connect.php";
include "helper.php";
$conn=connect();
			$id=$_GET['u'];
			$sql="delete from user where id=:id";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();

			logout();

			flash("success","Account Deleted Successfuly");
			
		
?>