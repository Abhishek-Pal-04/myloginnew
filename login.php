<?php
	session_start();
	
	/*if(isset($_SESSION['loggedIN'])){
		header(  'Location: profile.php');
		exit();
	}*/

	if (isset($_POST["login"])) {
		$connection = new mysqli("localhost", "root", "", "login");
		//encryptit
		$email = $connection->real_escape_string($_POST["emailPHP"]);
		$password = ($connection->real_escape_string($_POST["passwordPHP"]));
		$data = $connection->query("SELECT name FROM users WHERE email='$email' AND password='$password'");

		if ($data->num_rows > 0) {
			$_SESSION['loggedIN'] = '1';
			$_SESSION['email']=$email;
			exit('success');

		} else {
			
			exit('failed');
		}
	}	
?>      
