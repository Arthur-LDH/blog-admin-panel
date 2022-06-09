<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <?php
        require('../../config/config.php');

        session_start();

        if (isset($_POST['username'])){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
            $result = mysqli_query($conn,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);

            if($rows==1){
                $_SESSION['username'] = $username;
                header("Location: index.php");
            }else{
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }
    ?>
    <body>
        <main class="container">
            <div class="row justify-content-center align-items-center" style="min-height:100vh ;">
                <form class="col-4">
                    <div class="mb-3">
                    <label for="usernameLogin" class="form-label">Username</label>
                    <input type="text" class="form-control" id="usernameLogin">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="../../index.html">Home</a>
                </form>
            </div>
        </main>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>