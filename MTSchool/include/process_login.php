<?php
include_once 'db_conn.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['username'],$_POST['pass'])){
	$username = $_POST['username'];
	$password = $_POST['pass'];
	
	if (login($username,$password,$mysqli == true)){
		//login sucess
		header('Location: ../stu_pages/welcome.html');
	}else{
		//login failed
		header('Location: ../index.html);
	}
	
}else{
	echo 'invalid Request';
}

?>