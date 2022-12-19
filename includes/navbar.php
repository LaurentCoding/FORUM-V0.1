<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Suivi-Cardio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Publier une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-question.php">Mes questions</a>
        </li>
        <?php 
          if(isset($_SESSION['auth'])){
            ?>
          <li class="nav-item">
          <a class="nav-link" href="profil.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
        </li>
       
          <?php
          }
        ?>
        
        
    
    </div>
  </div>
</nav>