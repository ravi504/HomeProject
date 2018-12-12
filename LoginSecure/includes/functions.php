<?php
include_once 'db_conn.php';

function sec_session_start(){
	$session_name = "secure_session";
	//$secure = SECURE;
	//$httponly = true;
	
	 $cookieParams = session_get_cookie_params();
         session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"]);


	session_name($session_name);
	session_start();
	session_regenerate_id();
}

function login_check($email,$password,$mysqli){
          //var_dump($mysqli);
	 if ($stmt = $mysqli->prepare("SELECT id,username,password FROM member WHERE email = ? LIMIT 1")){
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$stmt->store_result();
		//$stmt->bind_result($user_id,$username,$db_password);
		//$stmt->fetch();
		
		if ($stmt->num_rows == 1){
                 $stmt->bind_result($user_id,$db_password);
                 $stmt->fetch();

			if ($password == $db_password){
				$SESSION['username'] = $username;
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
