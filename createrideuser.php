<?php
	session_start();
	include "connect.php";
	include "helper.php";
	$conn=connect();
	$error=[];
	$value=[];
	$userid=$_SESSION['_login'];
	$value['userid']=$userid;

	$_POST['rideas']=trim($_POST['rideas']);
	$_POST['country']=trim($_POST['country']);
	$_POST['city']=trim($_POST['city']);
	$_POST['date']=trim($_POST['date']);
	$_POST['from']=trim($_POST['from']);
	$_POST['to']=trim($_POST['to']);
	$_POST['time']=trim($_POST['time']);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(empty($_POST['rideas']))
			$error['rideas']="*Choose Any Option!!";
		else
			$value['rideas']=$_POST['rideas'];

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


		if(empty($_POST['time']))
		{
			$error['time']="*Time is required";
		}
		else
		{
			date_default_timezone_set("Asia/Kolkata");
			if($_POST['date']==date("Y-m-d") and $_POST['time']<date("H:i"))
				$error['time']="Invalid Time(Time should be more than current IST time)";
			else{
				
				$value['time']=$_POST['time'];
			}
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
		header("location:createride.php");
	}
	else
	{
		try{
			$sql="insert into rides(id,rideas,country,city,date,origin,destination,time) values(:userid,:rideas,:country,:city,:date,:from,:to,:time)";
			$stmt=$conn->prepare($sql);
			$stmt->execute($value);

			
			flash("success","Ride is Added");
			header("location: createride.php");
		}
		catch(PDOException $e)
		{
			echo $e->getmessage();
		}
	}




?>