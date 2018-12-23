<?php
include_once 'function.php';

sec_session_start();

//unset all session value
$_SESSION = array();

//get session parameter
$params = session_get_cookie_params();

//delete the actual cookie.
setcookie(session_name(), '',$params['path'],$params['domain']);

//destory session
session_destroy();
header('Location: ../index.html');		   
?>
