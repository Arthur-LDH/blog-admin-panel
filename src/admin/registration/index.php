<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <?php
        require('../../config/config.php');

        if(isset($_POST['registration'])) {
            // Passage des données en variable
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $cemail = htmlspecialchars($_POST['cemail']);
            $password = sha1($_POST['password']);
            $cpassword = sha1($_POST['cpassword']);
            // Check que tous les champs soient complétés
            if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['cemail']) AND !empty($_POST['password']) AND !empty($_POST['cpassword'])) {
                // Check que le pseudo ne soit pas utilisé
                $requser = $conn->prepare("SELECT * FROM users WHERE username = ?");
                $requser->execute([$username]);
                $userexist = $requser->fetch();
                if($userexist == 0) {
                    if($email == $cemail) {
                        // Check que le mail ne soit pas déjà utilisé
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $reqmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
                            $reqmail->execute([$email]);
                            $mailexist = $reqmail->fetch();
                            // $conn->next_result();
                            if($mailexist == 0) {
                                if($password == $cpassword) {
                                    // Créé une clef de confirmation
                                    $longueurKey = 15;
                                    $key = "";
                                    for($i=1;$i<$longueurKey;$i++) {
                                        $key .= mt_rand(0,9);
                                    }
                                    // Insert les nouvelles données dans la bdd
                                    $insertmbr = $conn->prepare("INSERT INTO users (username, email, pw, confirmkey) VALUES(?, ?, ?, ?)");
                
                                    $insertmbr->execute(array($username, $email, $password, $key));
                                    
                                    // Créé le mail de confirmation
                                    $header="MIME-Version: 1.0\r\n";
                                    $header.='From:"arthurldh@webcalibur.com'."\n";
                                    $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                    $header.='Content-Transfer-Encoding: 8bit';
                                    $message='
                                    <html>
                                        <body>
                                            <div align="center">
                                            <a href="confirmation.php?username='.urlencode($username).'&key='.$key.'">Confirm your account</a>
                                            </div>
                                        </body>
                                    </html>
                                    ';
                                    mail($email, "Account Confirmation", $message, $header);
                                    $erreur = "Your account has been created";
                                } else {
                                    $erreur = "Your passwords are not the same";
                                }
                            } else {
                            $erreur = "Your email is already used on this website";
                            }
                        } else {
                            $erreur = "Your email does not exist";
                        }
                    } else {
                        $erreur = "Your emails are not the same";
                    }
               } else {
                  $erreur = "Your Username already exists";
               }
            } else {
               $erreur = "Tous les champs doivent être complétés !";
            }
         }
    ?>
    <body>
        <main class="container">
            <div class="row justify-content-center align-items-center" style="min-height:100vh ;">
                <form class="col-4" action="" method="post" name="registration">
                    <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                    <label for="username" class="form-label">Confirm Email</label>
                    <input type="email" class="form-control" id="cemail" name="cemail">
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <button type="submit" value="Registration" name="registration" class="btn btn-primary">Sign In</button>
                    <a href="../login">Login</a>
                    <?php
                        if(isset($erreur))
                        {
                            echo '<font color="red">'.$erreur."</font>";
                        }
                    ?>
                </form>
            </div>
        </main>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>