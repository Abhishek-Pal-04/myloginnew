<?php
	session_start();
	
	if(!isset($_SESSION['loggedIN'])){
		header('Location: login.html');
		exit();
	}
?>
