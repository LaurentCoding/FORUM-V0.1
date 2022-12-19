<?php require('actions/users/loginAction.php'); ?>
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
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary mb-3" name="validate">Se connecter</button>
  <a class="mb-3" href="signup.php"><p>Je n'ai pas de compte, je m'inscris</p></a>
  
</form>
</body>
</html>