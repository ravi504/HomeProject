<?php
include_once 'db_conn.php';

function sec_session_start(){
	$session_name = "secure_session";
	//$secure = SECURE;
	//$httponly = true;
	
	$cookieParam = session_get_cookie_params;
	session_get_cookie_params($cookieParam['lifetime'], $cookieParam['path'], $cookieParam['domain']);
	
	session_name = $session_name;
	session_start();
	session_regenerate_id();
}

function login_check($email,$password,$mysqli){
	 if ($stmt = $mysqli->prepare("SELECT id,password FROM member WHERE email = ? LIMIT 1");){
		 $stmt->bind_param('s',$email);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($user_id,$db_password);
		$stmt->fetch();
		
		if ($stmt->num_rows == 1){
			if ($password == $db_password){
				return true;
			}else{
				return false;
			}
		}else{
			alert('no record found');
		}
	 }else{
		 alert('could not prepare statement');
	 }
		
		
		
}
?>