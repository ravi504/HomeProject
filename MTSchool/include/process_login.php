<?php
include_once 'db_conn.php';
include_once 'function.php';


sec_session_start();

if (isset($_POST['user'],$_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	if (login($username,$password,$mysqli) == true){
		//login sucess
		header('Location: ../stu_pages/welcome.php');
	}else{
		//login failed
		header('Location: ../index.html');
	}
	
}else{
	echo "Post Error";
}




?>
