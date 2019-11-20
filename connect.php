<?php
	$s="localhost";
	$u="root";
	$p="";
	$d="commutetogether";
	function connect()
	{
		global $s,$u,$p,$d;
		try{
			$conn=new PDO("mysql:host=$s;dbname=$d",$u,$p);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			
			return $conn;
		}
		catch(PDOException $e)
		{
			echo $e->getmessage();
		}
	}
	
?>