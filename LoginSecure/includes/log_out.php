<?php
include_once 'functions.php';

sec_session_start();

//unset all session
$_SESSION = array();

//get session parameter
$params = session_get_cookie_params();

//delete actuall cookie
setcookie(session_name(),'',$params['path'],$params['domain']);

session_destroy();
header('Location: ../index.php');




?>
