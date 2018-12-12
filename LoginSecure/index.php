<?php
include_once 'includes/db_conn.php';
include_once 'includes/functions.php';


sec_session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <!-- <link rel="stylesheet" href="styles/main.css" /> -->
      <!--  //<script type="text/JavaScript" src="js/sha512.js"></script> --> 
        <script type="text/JavaScript" src="js/login_form.js"></script> 
    </head>
<body>
		
        <form action="includes/process_login.php" method="post" name="login_form">                      
            Email: <input type="text" name="email" />
            Password: <input type="password" name="password" id="password"/>
            <input type="button" value="Login" onclick="form_check(this.form);" /> 
        </form>
 
 
      
</body>
</html>
