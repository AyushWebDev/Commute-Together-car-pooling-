<?php
	$s="localhost";
	$u="root";
	$p="";
	$d="commutetogether";
	
	
		
		try{
			$conn=new PDO("mysql:host=$s;dbname=$d",$u,$p);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql="alter table rides add column rideid int primary key auto_increment after id";
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			echo "executed";
		}
		catch(PDOException $e)
		{
			echo $e->getmessage();
		}
	
	
?>