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

    function checksession(){
        if (session_status() == PHP_SESSION_ACTIVE) {
            header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/Panel Blog/');
        }
    }

?>