<?php
	
session_start();
	require "helper.php";
	logout();
	flash("success","Logged Out Successfuly");
	header("location:homepage.php");
	 

?>