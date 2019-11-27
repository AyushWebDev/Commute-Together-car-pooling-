<?php
	session_start();
	include "connect.php";
	include "helper.php";
	$conn=connect();
	$error=[];
	$value=[];
	$userid=$_SESSION['_login'];
	

	$_POST['country']=trim($_POST['country'])
	$_POST['city']=trim($_POST['city'])
	$_POST['date']=trim($_POST['date']);
	$_POST['from']=trim($_POST['from']);
	$_POST['to']=trim($_POST['to']);
	

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		

		if(empty($_POST['country']))
		{
			$error['country']="*Country is required";
		}
		else
		{
			if(!preg_match("/^[a-z A-Z]+$/",$_POST['country']))
			$error['country']="Invalid COUNTRY NAME";	
			else
			{
				try{
					$sql="select * from countries where country=:c";
					$stmt=$conn->prepare($sql);
					$stmt->bindParam(':c',$_POST['country']);
					$stmt->execute();
					if($stmt->rowCount()>0)
						$value['country']=$_POST['country'];
					else
						$error['country']="Service Not available for your country";
				}
				catch(PDOException $e){
					    echo "<br>".$e->getMessage();
					    die();
				}
			}
		}


		if(empty($_POST['city']))
		{
			$error['city']="*City is required";
		}
		else
		{
			if(!preg_match("/^[a-z A-Z]+$/",$_POST['city']))
				$error['city']="Invalid CITY NAME";
			else
				$value['city']=$_POST['city'];
		}


		if(empty($_POST['date']))
		{
			$error['date']="*Date is required";
		}
		else
		{
			if($_POST['date']<date("Y-m-d"))
				$error['date']="Invalid Date";
			else
				$value['date']=$_POST['date'];
		}



		if(empty($_POST['from']))
		{
			$error['from']="*Enter Your Place of origin";
		}
		else
		{
			if(!preg_match("/^[a-z A-Z0-9]+$/",$_POST['from']))
				$error['from']="Invalid PLACE";
			else
				$value['from']=$_POST['from'];
		}


		if(empty($_POST['to']))
		{
			$error['to']="*Enter Your Destination";
		}
		else
		{
			if(!preg_match("/^[a-z A-Z]+$/",$_POST['to']))
				$error['to']="Invalid PLACE";
			else
				$value['to']=$_POST['to'];
		}


		
	}
	else {
		flash('danger','Something went wrong');
		header("location:createride.php");
	}

	if(count($error)>0)
	{
		$_SESSION['error']=$error;
		$_SESSION['value']=$value;
		header("location: search.php");
	}
	else
	{
		try{
			$sql="select * from rides where origin=:from and destination=:to and date=:date";
		}
		catch(PDOException $e)
		{
			echo $e->getmessage();
		}
	}




?>