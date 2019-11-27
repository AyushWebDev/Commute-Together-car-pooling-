<?php
	include "connect.php";
	include "helper.php";
	$conn=connect();
	$error=[];
	$value=[];
	$email=trim($_POST['email']);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(empty($email))
			$error='Enter Email';
		else {
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				$error['email']="INVALID INPUT";
			else
			{
				$sql="select * from user where email=:e";
				$stmt=$conn->prepare($sql);
				$stmt->bindParam(':e',$email);
				$stmt->execute();

				if($stmt->rowCount()>0)
					$user=$stmt->fetch();
				else
					$error['email']="Email Doesn't Exit";
			}
		}
	}

	else {
		flash('danger','something went wrong');
		header("location:forgotpass.php");
	}

	if(count($error)==0)
	{
		$link="changepass.php"."?email={$user['email']}";
		$message="This mail is for changing password<br>please click on below link<br><a href={$link}>reset password</a>";
		echo $message;
	}
	
		else
	{
		$_SESSION['error']=$error;
		$_SESSION['value']=$value;
		header("location:forgotpass.php");
	}
	
?>