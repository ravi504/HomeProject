<?php
include_once 'db_conn.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['email'], $_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	 if (login_ckeck($email,$password,$mysqli) == true){
		 alert('login success'.$email);
	 }else{
		 alert('login faill');
	 }
}else{
	echo 'Invalid request';
}

?>