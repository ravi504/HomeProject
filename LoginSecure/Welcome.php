<?php
include_once 'includes/db_conn.php';
include_once 'includes/functions.php';
 
sec_session_start();
//$SESSION['username'] = $username;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
       <!-- <link rel="stylesheet" href="styles/main.css" /> -->
    </head>
    <body>
           <?php
 
            ?> 
            <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
            
            <p>Return to <a href="includes/log_out.php">log_out</a></p>
        
    </body>
</html>
