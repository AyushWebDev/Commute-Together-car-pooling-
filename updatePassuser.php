<?php
	session_start();
	include "connect.php";
	include "helper.php";
	$id=$_GET['id'];
	$conn=connect();

	$error=[];
	$value=[];
	$pass=trim($_POST['password']);
	$newpass=trim($_POST['newpassword']);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(empty($pass))
			$error['pass']='Enter Password';
		else
		{
			if(strlen($pass)<6)
				$error['pass']="PASSWORD MUST HAVE ATLEAST 6 LETTERS";
			else
			{
				$value['pass']=md5($pass);
			}
		}



		if(empty($newpass))
			$error['newpass']="Enter Password";
		else {
			if(strlen($newpass)<6)
				$error['newpass']="PASSWORD MUST HAVE ATLEAST 6 LETTERS";
			else if ($newpass!=$pass) {
				$error['newpass']="PASSWORDS MUST BE SAME";
			}
			else
			{
				$value['newpass']=md5($newpass);
				$p=$value['newpass'];
			}
		}
	}

	if(count($error)==0)
	{
		$sql="update user set password='$p' where id=:id";
		$stmt=$conn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		
		flash("success","Password Changed Succesfully");
		header("location: homepage.php");

	}
	else
	{
		$_SESSION['error']=$error;
		$_SESSION['value']=$value;
		header("location:updatePass.php?u=".$id);
	}

?>