<?php
include_once 'include/db_conn.php';
include_once 'include/functions.php';

sec_session_start();

if (login_check($mysqli) == true){
	$logged = "in";
}else{
	$logged = "out";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        // <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
<body>
        <?php
			if (isset($_POST['error'])){
				echo '<p class="error">Error Logging In!</p>';
			}
        ?> 
        <form action="include/process_login.php" method="post" name="login_form">                      
            Email: <input type="text" name="email" />
            Password: <input type="password" name="password" id="password"/>
            <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
        </form>
 
<?php
        if (login_check($mysqli) == true){
			echo '<p>Currently logged' .$logged . ' as ' . htmlentities($_SESSION['username']).'.</p>';
			echo '<p>Do you want to change user ? <a href="include/log_out.php">Log out</a>.</p>';
		}else{
			echo '<p>Currently logged' . $logged .'.</p>';
			echo "<p>if you don't have login please register <a href='register.php'>Register</a></p>"
		}
?>      
</body>
</html>