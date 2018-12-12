<?php
include_once 'db_conn.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['email'], $_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	 if (login_check($email,$password,$mysqli) == true){
		 header('Location: ./Welcome.php');
	 }else{
		 header('Location: ./index.php');
	 }
}else{
	echo 'Invalid request';
}

?>
