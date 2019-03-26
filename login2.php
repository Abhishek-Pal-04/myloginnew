<?php
session_start();
require_once 'dbconfig.php';

if(isset($_POST['login']))
{
$email=($_POST['emailPHP']);
$password=($_POST['passwordPHP']);

try
{
	$stmt=$db_con->prepare("SELECT * FROM users WHERE email=:email");
	$stmt->execute(array(":email"=>$email));
	$count=$stmt->rowCount();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($row['password']==$password)
	{
	$_SESSION['loggedIN'] = '1';
	$_SESSION['email']=$email;
	exit('success');
	}
	else
	{
		exit('failed');
		
	}
	
	}
	catch(PDOException $e){
	echo $e->getMessage();
	}
	}
	?>