<?php
  require('actions/users/signupAction.php');
?>

  <?php include 'includes/head.php'; ?>
<body>
  <header>
    <?php include 'includes/navbar.php'; ?>
  </header>
<form class="container mt-4" method="POST">
  <div class="mb-3">
    <?php 
    
      if(isset($errorMsg)){
        echo '<p>' .$errorMsg.'</p>';
      }
    ?>
    <label for="exampleInputEmail1" class="form-label">Pseudo</label>
    <input type="text" class="form-control"  name="pseudo">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="lastname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prénom</label>
    <input type="text" class="form-control" name="firstname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary mb-3" name="validate">S'inscrire</button>
  <a class="mb-3" href="login.php"><p>J'ai déjà un compte , je me connecte</p></a>
</form>

</body>
</html>