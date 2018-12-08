<?php
include_once 'db_conn.php';
include_once 'db_config.php';

$error_msg = "";

if (isset($_POST['username'], $_POST['email'], $_POST['p']){
	//sanitize and filter the input data.
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$email = filter_input($email, FILTER_SANITIZE_STRING);
	 
	 if (!filter_var($email, FILTER_SANITIZE_STRING)){
		 //not a valid email 
		 $error_msg .= '<p class="error">Email address is not valid</p>';
	 }
	
	$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
	 if (strlen($password) != 128){//hash pwd is 128 char long.
		 $error_msg .= '</p class="error">invalid password configuration</p>';
	 }
	 
	  // Username validity and password validity have been checked client side.
      // This should should be adequate as nobody gains any advantage from
      // breaking these rules.
	  
	  $prep_stmt = "SELECT id FROM member WHERE username = ? LIMIT 1";
	  $stmp = mysqli->prepare($prep_stmt);
	  
	  if ($stmt){
		  $stmt->bind_param('s', $username);
		  $stmt->execute();
		  $stmt->store_result();
		  
		  if ($stmt->num_rows == 1){
			  //this username is already exists
			  $error_msg .= '<p class="error">A username is already exists</p>';
			  $stmt->close();
		  }
	  }else{
		  $error_msg .= '<p class="error">database error</p>';
		  $stmt->close();
	  }
  	 // We'll also have to account for the situation where the user doesn't have
     // rights to do registration, by checking what type of user is attempting to
     // perform the operation.
	 
	 if (empty($error_msg)){
		 // Create hashed password using the password_hash function.
         // This function salts it with a random salt and can be verified with
         // the password_verify function.
		 $password = password_hash($password, PASSWORD_BCRYPT);
		 
		 //now insert the new entry in database.
		 if ($insert_stmt = $mysqli->prepare("INSERT INTO member (username, email, password) VALUES(?,?,?)")){
			 $insert_stmt->bind_param('sss',$username,$email,$password);
			  if (! $inset_stmt->execute()){
				  header('Location: ../error.php?err=Registration fail: INSERT');
			  }
		 }
		  header('Location: ./register_success.php');
	 }
}


?>