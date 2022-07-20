<?php 
    session_start();
    session_unset();
    setcookie("email", NULL, -1, "/");
    unset($_COOKIE['email']);
    setcookie("id", NULL, -1, "/");
    unset($_COOKIE['pw']);
    session_destroy();
    
    header("Location: /Panel%20Blog/");
?>
