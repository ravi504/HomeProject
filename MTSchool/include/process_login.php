<?php
include_once 'db_conn.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['email'],$_POST['p'])){
	$email = $_POST['email'];
	$password = $_POST['p'];
	
	if (login($email,$password,$mysqli == true)){
		//login sucess
		header('Location: ../protected_page.php');
	}else{
		//login failed
		header('Location: ../index.php?error=1');
	}
	
}else{
	echo 'invalid Request';
}

?>