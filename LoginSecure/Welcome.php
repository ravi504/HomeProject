<?php
include_once 'include/db_conn.php';
include_once 'include/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
       <!-- <link rel="stylesheet" href="styles/main.css" /> -->
    </head>
    <body>
        
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            
            <p>Return to <a href="index.php">log_out</a></p>
        
    </body>
</html>