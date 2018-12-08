<?php
include_once 'functions.php';

sec_session_start();

//unset all session value
$_SESSION = array();

//get session parameter
$params = session_get_cookie_params();

//delete the actual cookie.
setcookie(session_name(),
           '', time() - 42000,
		   $params['path'],
		   $params['domain'],
		   $params['secure'],
		   $params['httponly']);

//destory session
session_destroy();
header('Location: ../index.php');		   
?>