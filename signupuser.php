<?php
	session_start();
	require "connect.php";
	require "helper.php";
	$error=[];
	$value=[];
	$conn=connect();

	$_POST['firstname'] = trim($_POST['firstname']);
	$_POST['lastname'] = trim($_POST['lastname']);
	$_POST['email'] = trim($_POST['email']);
	$_POST['contact'] = trim($_POST['contact']);
	$_POST['password'] = trim($_POST['password']);
	$_POST['gender'] = trim($_POST['gender']);

	if($_SERVER["REQUEST_METHOD"]=='POST')
	{
		if(empty($_POST['firstname']))
			$error['firstname']="*Firstname is required!";
		else
		{
			if(!preg_match("/^[a-z A-Z]+$/",$_POST['firstname']))
			$error['firstname']="Invalid FIRSTNAME";
			else
			$value['firstname']=$_POST['firstname'];
		}

		if(empty($_POST['lastname']))
			$error['lastname']="*Lastname is required!";
		else
		{
			if(!preg_match("/^[a-z A-Z]+$/",$_POST['lastname']))
			$error['lastname']="Invalid LASTNAME";
			else
			$value['lastname']=$_POST['lastname'];
		}

		if(empty($_POST['email']))
			$error['email']="*Email is required";
		else
		{
			if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
			$error['email']="INVALID EMAIL";
		else
		{
			try
			{
				$sql="select * from user where email=:email";
				$stmt=$conn->prepare($sql);
				$stmt->bindParam(':email',$_POST['email']);
				
				$stmt->execute();
				if($stmt->rowCount()>0)
					$error['email']="EMAIL ALREADY EXISTS";
				else
					$value['email']=$_POST['email'];
			}
			catch(PDOException $e)
			{
				echo "<br>".$e->getmessage();
				die();
			}
		}
		}

		if(empty("gender"))
			$error['gender']="*Gender is required";
		else
			$value['gender']=$_POST['gender'];

		if(empty($_POST['password']))
			$error['password']="Password is required";
		else
		{
			if(strlen($_POST['password'])>=6)
				$value['password']=md5($_POST['password']);
			else
				$error['password']="Password must contain atleast 6 letters!";
		}

		if(empty($_POST['contact'])){
			$error['contact'] = "Contact is required";
		}
		else{
			if(preg_match("/^[6-9][0-9]{9}$/", $_POST['contact'])){
				
					try{
					    $stmt = $conn->prepare("select * FROM user WHERE contact=:value"); 
						$stmt->bindParam(':value', $v);
						$v= $_POST['contact'];
						$stmt->execute();
						if($stmt->rowCount() > 0 ){
							$error['contact']='Contact already taken';
						}else{
							$value['contact']=$_POST['contact'];
						}
					}
					catch(PDOException $e){
					    echo "<br>".$e->getMessage();
					    die();
					}
				
				}		
			
			else{
				$error['contact']="*Invalid contact";
			}
		}
	}

	if(count($error)>0)
	{
		$_SESSION['error']=$error;
		$_SESSION['value']=$value;
		header("location:signup.php");
	}
	else
	{
		try{
		$sql="insert into user(firstname,lastname,email,gender,password,contact) values(:firstname,:lastname,:email,:gender,:password,:contact)";
		$stmt=$conn->prepare($sql);
		$stmt->execute($value);

		$sql="select * from user where email=:email && password=:password";
			$stmt=$conn->prepare($sql);
			$stmt->execute(array(':email'=>$value['email'],':password'=>$value['password']));
		if($stmt->rowCount()>0)
			{
			$user=$stmt->fetch();
			$_SESSION['user']=$user;
			login($user['id']);
			}
			else
			{
				flash('danger',"something went wrong");
			}
		}
		catch(PDOException $e)
		{
		echo $e->getmessage();

		}
	
	}
?>