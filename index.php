<?php 
    session_start();
    
    require($_SERVER['DOCUMENT_ROOT'].'/Panel Blog/config/config.php');
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <?php include('./menu.php'); ?>

        <div class="container">
        
            <?php 
                if (isset($_COOKIE['email']) && isset($_COOKIE['pw'])) {
                    echo '<p> Mon adresse email est ' . $email. '.';
                    if ($role==1) {
                        echo '</br> Je suis admin.</p>';
                    } else{
                        echo '</p>';
                    };
                
                } elseif (isset($_SESSION['email']) && isset($_SESSION['pw'])){
                    echo "<p> Il n'y a pas de cookies mais mon id est " . $id . '.';
                    if ($role==1) {
                        echo '</br> Je suis admin.</p>';
                    } else{
                        echo '</p>';
                    };
                } else {
                    echo "<p>Les cookies sont supprimés</p>";
                };                
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>