<?php

include_once 'db_config.php';

function sec_session_start(){
	$session_name = "sec_session_id"; //custom session name
	//$secure = SECURE;
	//$httponly = true; //this will stop javascript being able to access session id.
	
	//now forces session to use only cookies;
	/*if (ini_set('session.use_only_cookies', 1) === FALSE){
		header("Location: ../error.php?err=could not a safe session (ini_set)");
		exit();
	}*/
	//get current cookies params.
	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"]);
	
	//set the session name which set above.
	session_name($session_name);
	session_start();
	session_regenerate_id();
}

//Check the email and password on database.
function login($username,$password,$mysqli){
	
	//using prepare statement, SQL injection is not possible
	//stmt is stand for statement.
	if ($stmt = $mysqli->prepare("SELECT id,username,password from member
	     WHERE username = ? LIMIT 1")){
		 $stmt->bind_param('s', $username);//bind email to parameter. Here 's' stand for string.
		 $stmt->execute();
		 $stmt->store_result();
		 
		 //now get variable from result
		 $stmt->bind_result($user_id,$username,$db_password);
		 $stmt->fetch();
		 
		 if ($stmt->num_rows == 1){
			 if ($password == $db_password){
				 $_SESSION['username'] = $username;
				 return true;
			 }
		 }else{
			 return false;
		 }
		 
		 /*
		 if ($stmt->num_rows == 1){
			 // If the user exists we check if the account is locked
            // from too many login attempts 
			if (checkbrute($user_id,$mysqli) === true){
				 // Account is locked 
                // Send an email to user saying their account is locked
                return false;
			}else{
				// Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.
				if (password_verify($password, $db_password)){
					// Password is correct!
                    // Get the user-agent string of the user.
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					
					//XSS protection we might print this value for user_id.
					$user_id = preg_replace("/[^0-9]+/","",$user_id);
					$_SESSION['user_id'] = $user_id;
					
					//XSS protection we might print this value for username.
					$username = preg_replace("/[^a-zA-Z0-9_]\-/+","",$username);
					$_SESSION['username'] = $username;
					$_SESSION['login_string'] = hash('sha512', $db_password. $user_browser);
					//login successful.
					return true;
				}
			}
		 }else{
			 //no user exits.
			 return false;
		 }*/
	}
}

/*
function checkbrute($user_id, $mysqli){
	//get timestap of current time.
	$now = time();
	
	//all login attemps are counted from the past 2 hours.
	$valid_attemps = $now - (2 * 60 * 60);
	
	if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts
	                     WHERE user_id = ? AND time > '$valid_attemps'")){
		$stmt->bind_param('i', $user_id);
		
		//Execute the prepared query
		$stmt->execute();
		$stmt->store_result();
		
		//if there have been more then 5 failed logins.
		if ($stmt->num_rows > 5){
			return true;
		}else{
			return false;
		}
	}
}

function login_check($mysqli){
	
	//check all session variable are set.
	if (isset($_SESSION['user_id'],
	          $_SESSION['username'],
              $_SESSION['login_string'])){
		
		$user_id = $_SESSION['user_id'];
		$username = $_SESSION['username'];
		$login_string = $_SESSION['login_string'];
		
		//Get the user-agent string of user.
		$user_browser = $_SERVER['HTTP_USER_AGENT'];
		
		if ($stmt = $mysqli->prepare(
		     "SELECT password FROM member WHERE id = ? LIMIT 1")){
			
			//bind user id to parameter.
			$stmt->bind-param('i', $user_id);
			$stmt->execute();
			$stmt->store_result();
			
			if ($stmt->num_rows == 1){
				
				//if the user is exit get varaiable from result.
				$stmt->bind_result($password);
				$stmt->fetch();
				$login_check = hash('sha512', $password.$user_browser);
				
				if (hash_equals($login_check, $login_string)){
					//logged in
					return true;
				}else{
					//not logged in
					return false;
				}
			}else{
				//not logged in
				return false;
			}
		}else{
			//not logged in.
			return false;
		}
	}else{
		//not logged in.
		return false;
	}
}

function esc_url($url){
	if ("" == $url){
		return $url;
	}
	$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i','',$url);
	
	$strip = array('%0d', '%0a', '%0D', '%0A');
	$url = (string) $url;
	
	$count = 1;
	while ($count){
		$url = str_replace($strip, '', $url, $count);
	}
	
	$url = str_replace('://', ';//', $url);
	$url = htmlentities($url);
	$url = str_replace('&amp;', '&#038;', $url);
	
	if ($url[0] !== '/'){
		 // We're only interested in relative links from $_SERVER['PHP_SELF']
		return '';
	}else{
		return $url;
	}
}

*/
?>