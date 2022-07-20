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

    // Variable pour check les connexions
    $ifconnected = isset($_COOKIE['email']) || isset($_SESSION['email']) && isset($_COOKIE['pw']) || isset($_SESSION['pw']) ;


    // Conditions pour changer les variables si elles sont enregistrées en tant que cookies ou non
    if (isset($_COOKIE['email']) && isset($_COOKIE['pw'])) {
        $email = $_COOKIE['email'];
        $pw = $_COOKIE['pw'];
        
    } elseif (isset($_SESSION['email']) && isset($_SESSION['pw'])) {
        $email = $_SESSION['email'];
        $pw = $_SESSION['pw'];
    } else{
        $email = "";
        $pw = "";
    }

    // Met en variable les différentes informations de l'utilisateur connecté
    $query = " SELECT * FROM `users` WHERE email='$email' and pw='".hash('sha1', $pw)."' ";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
        while($row = mysqli_fetch_array($result)){
            $user = $row['username'];
            $id = $row['id'];
            $role = $row['role'];
            $avatar = $row['avatar'];
        } 
    }

    $lastname = "";

?>