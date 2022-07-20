<?php 
    session_start();

    require($_SERVER['DOCUMENT_ROOT'].'/Panel Blog/config/config.php');


?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    </head>
    <body>
        <div class="container-fluid bg-light p-0">

            <?php include($_SERVER['DOCUMENT_ROOT'].'/Panel Blog/menu.php'); ?>

            <div class="container p-5 mt-4">
                <div class="row align-items-start justify-content-between">
                    <div class="col d-flex align-items-center justify-content-start">
                        <a href="#" class="me-3">
                            <div width="80" height="80" class="rounded-circle" style="width: 80px; height: 80px; overflow: hidden; text-align: center; vertical-align: middle;">
                                <?php echo '<img src="/Panel%20Blog'.$avatar.'" alt="mdo" style="margin: auto; max-width:80px; height:auto;");">'
                                ?>
                            </div>
                            
                        </a>
                        <p class="d-flex align-items-center fs-4 fw-bold lh-sm" style="margin: 0;"> <?php echo $user ?> <br> <?php echo $lastname ?></p>
                    </div>
                    <!-- <div class="col-lg-2 d-flex justify-content-lg-end">
                        <a href="#" class="mt-3 btn btn-primary bg-gradient text-white">Settings</a>
                    </div> -->
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" style="padding: 0 10% 0 10%;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#">Plannings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><i class="fa-solid fa-gear"></i></a>
                    </li>
                </ul>
            </div>
                
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/4ab6a0fc12.js" crossorigin="anonymous"></script>
    </body>
</html>