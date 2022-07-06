<?php
    // Informations d'identification
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'admin_panel');
    
    // Connexion à la base de données MySQL 
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Vérifier la connexion
    if($conn === false){
        die("ERROR : Unable to connect " . mysqli_connect_error());
    }

    $user = "";
    $pw = "";
    $id = "";
    $role = "";

    if (isset($_COOKIE['username']) && isset($_COOKIE['pw'])) {
        $user = $_COOKIE['username'];
        $pw = $_COOKIE['pw'];
        $id = $_COOKIE['id'];
        $role = $_COOKIE['role'];
    } elseif (isset($_SESSION['username']) && isset($_SESSION['pw'])) {
        $user = $_SESSION['username'];
        $pw = $_SESSION['pw'];
        $id = $_SESSION['id'];
        $role = $_SESSION['role'];
    } else{
        $user = "";
        $pw = "";
        $id = "";
        $role = "";
    }

?>