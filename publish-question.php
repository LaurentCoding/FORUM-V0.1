<?php

require('actions/questions/publishQuestionAction.php');
require('actions/users/securityAction.php');
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
      } elseif(isset($successMsg)){
        echo '<p>' .$successMsg.'</p>';
      }
    ?>
    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
    <input type="text" class="form-control"  name="title">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description de la question</label>
    <textarea  class="form-control" name="description"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
    <textarea class="form-control" name="content"></textarea>
  </div>

  <button type="submit" class="btn btn-primary mb-3" name="validate">Publier la question</button>
  
</form>
  </body>
</html>