<?php
include_once '../include/db_conn.php';
include_once '../include/function.php';



sec_session_start();

?>

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

            <p>Return to <a href="../include/log_out.php">log_out</a></p>

    </body>
</html>

