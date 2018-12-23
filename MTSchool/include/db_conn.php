<?php
//include_once 'db_config.php';

//stablished the database connection.
$mysqli = new mysqli('localhost','root','','secure_login');

if($mysqli->connect_error) {
  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");


/*
 if ($msqli->connect_error){
	 die("Connection failled" .$mysqli->connect_error);
 }*/

/*
if ($stmt = $mysqli->prepare("SELECT email, password FROM member")){
     $stmt->execute();
     $stmt->store_result();
     
      if ($stmt->num_rows == 1){
          $stmt->bind_result($email,$pass);
          $stmt->fetch();
      echo $email . " and password " . $pass;
 }else{
   echo "no row found";
}
}else{
  echo "prepare statment error";
}
*/
?>
