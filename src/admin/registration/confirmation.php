<?php
    require('../../config/config.php');
 
if(isset($_GET['username'], $_GET['key']) AND !empty($_GET['username']) AND !empty($_GET['key'])) {
   $username = htmlspecialchars(urlencode($_GET['username']));
   $key = htmlspecialchars($_GET['key']);
   $requser = $conn->prepare("SELECT * FROM users WHERE username = ? AND confirmkey = ?");
   $requser->execute(array($pseudo, $key));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirmed'] == 0) {
         $updateuser = $conn->prepare("UPDATE users SET confirmed = 1 WHERE username = ? AND confirmkey = ?");
         $updateuser->execute(array($username,$key));
         echo "Votre compte a bien été confirmé !";
      } else {
         echo "Votre compte a déjà été confirmé !";
      }
   } else {
      echo "L'utilisateur n'existe pas !";
   }
}
?>