<?php

include_once 'db_conn.php';

$myname = "jack";

 //$mysqli = new mysqli('localhost','root','','secure_login'); 

 error_reporting(-1); // reports all errors
 ini_set("display_errors", "1"); // shows all errors
 ini_set("log_errors", 1);
 ini_set("error_log", "php-error.log");

function sec_session_start(){
        $session_name = "sec_session_id"; //custom session name
        //$secure = SECURE;
        //$httponly = true; //this will stop javascript being able to access session id.

        //now forces session to use only cookies;
        /*if (ini_set('session.use_only_cookies', 1) === FALSE){
                header("Location: ../error.php?err=could not a safe session (ini_set)");
                exit();
        }*/
        //get current cookies params.
        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"]);

        //set the session name which set above.
        session_name($session_name);
        session_start();
        session_regenerate_id();
}

function login($username,$password,$mysqli){
          //var_dump($mysqli);
    //echo $username.$password.$mysqli;

    if ($stmt = $mysqli->prepare("SELECT `id`, `username`, `password` FROM `member` WHERE `username` = ?")){
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();
                
               if ($stmt->num_rows == 1){
                 $stmt->bind_result($user_id,$user_name,$db_password);
                 $stmt->fetch();

                        if ($password == $db_password){
                                $_SESSION['username'] = $user_name;
                                //$_SESSION['login_string'] = $db_password;
                                return true;
                        }else{
                                return false;
                        }
                }else{
                        echo 'no record found';
                }
         }else{
                 echo 'could not prepare statement';
                 //$stmt->close();  
         }
       echo "error in login()";
       
}

function login_session(){
     if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        //$email = $_SESSION['email'];
        //$login_string = $_SESSION['login_string'];
      }
}


?>
