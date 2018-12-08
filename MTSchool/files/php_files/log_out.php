<?php
 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db_name = "test";
 
 $conn = mysqli_connect($host,$user,$pass,$db_name);
 
 if (!$conn){
	 die("Connection falied" .mysqli_connect_error());
 }
 
 $query = "SELECT id, name, food, oder_time, price FROM potluck";
 $result = mysqli_query($conn,$query);
 
 if (mysqli_num_rows($result) > 0){
	 while($row = mysqli_fetch_assoc($result)){
		 echo "id : " . $row["id"] . " " . "Name :" . $row["name"]. " " . "food :" . $row["food"]. " ". "oder_time :" . $row["oder_time"]. " " . "Price :" . $row["price"]. " " ."<br>"; 
	 }
 }else{
	 echo "no data found";
 }
 
 mysqli.close($conn);
 
 
?>

