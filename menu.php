<div class="container-fluid bg-white px-5 m-0">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/Panel%20Blog/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg> -->
        <img class="bi me-2" src="/Panel%20Blog/assets/img/atom.svg" alt="" style="height: 50px; width: 50px;">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/Panel%20Blog/" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="/Panel%20Blog/blog/" class="nav-link px-2 link-dark">Blog</a></li>
      </ul>

      <?php 
        if (isset($_COOKIE['username']) || isset($_SESSION['username']) && isset($_COOKIE['pw']) || isset($_SESSION['pw'])) {
            echo '<div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/Panel%20Blog/assets/img/avatar-blank.jpg" alt="mdo" width="45" height="45" class="rounded-circle"></a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                      <li><p class="dropdown-item disabled">' . $user . '</p></li>';

            if ($role==1) {
                echo '<li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/Panel%20Blog/admin/">Admin Panel</a></li>';
            }
            echo '    <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/Panel%20Blog/profile/index.php?id='. $id .'">Profile</a></li>
                      <li><a class="dropdown-item" href="/Panel%20Blog/profile/settings.php">Settings</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/Panel%20Blog/logout.php">Sign out</a></li>
                      </ul>
                      </div>' ;
        } else {
            echo '<div class="col-md-3 text-end">
                    <a href="/Panel%20Blog/profile/login/" type="button" class="btn btn-outline-primary me-2">Login</a>
                    <a href="/Panel%20Blog/profile/registration/" type="button" class="btn btn-primary">Sign in</a>
                  </div>' ;
        }
      ?>
    </header>
  </div>