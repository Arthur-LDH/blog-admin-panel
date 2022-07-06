<?php 
    session_start();
    session_unset();
    setcookie("username", NULL, -1, "/");
    unset($_COOKIE['username']);
    setcookie("id", NULL, -1, "/");
    unset($_COOKIE['id']);
    setcookie("role", NULL, -1, "/");
    unset($_COOKIE['role']);
    setcookie("pw", NULL, -1, "/");
    unset($_COOKIE['pw']);
    session_destroy();
    
    header("Location: /Panel%20Blog/");
?>