<?php
//include_once 'db_config.php';

$mysqli = new MySQLi('localhost', 'root', '', 'secure_login');

//$mysqli = mysqli_connect('localhost', 'root', '', 'secure_login');

/*
$query = "SELECT email FROM member";
$result = mysqli_query($mysqli,$query);

if (mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_assoc($result)){
  echo $row['email'];
}
}
*/

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

//var_dump($mysqli)

?>
