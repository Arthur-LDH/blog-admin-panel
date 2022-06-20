<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Panel Blog/config/config.php');

    // session_start();

    checksession();

    if (isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM `users` WHERE username='$username' and pw='".hash('sha1', $password)."'";
        // $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if($rows==1){
            $_SESSION['username'] = $username;
            header("Location: /Panel%20Blog/");
        }else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/Panel Blog/menu.php'); ?>
        <main class="container">
            <div class="row justify-content-center align-items-center" style="margin-top: 20vh ;">
                <form class="col-4" action="" method="post" name="login">
                    <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div> -->
                    <button type="submit" value="Connexion" name="submit" class="btn btn-primary">Login</button>
                    <a href="../registration/">Sign In</a>
                    <?php if (! empty($message)) { ?> <p class="errorMessage"><?php echo $message; ?></p><?php } ?>
                </form>
            </div>
        </main>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>