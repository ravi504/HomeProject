<?php
include_once 'db_config.php';

//stablished the database connection.
$mysqli = new mysqli(HOST,USER,PASS,DATABASE);

 if ($msqli->connect_error){
	 die("Connection failled" .$mysqli->connect_error);
 }
?>