<?php
 session_start();
 require('actions/users/showOneUsersProfileAction.php');
?>
<?php include 'includes/head.php'; ?>

<body>
  <header>
    <?php include 'includes/navbar.php'; ?>
  </header>
  <div class="container mt-4">
    <?php 
      if(isset($errorMsg)){
        echo $errorMsg;
      }

      if(isset($getHisQuestions)){
        ?>
          <div class="card">
            <div class="card-body">
              <h4>@<?= $user_pseudo; ?></h4>
              <hr />
              <p><?= $user_lastname . ' ' . $user_firstname; ?></p>
            </div>
          </div>
          <br />
         
        <?php
        while($question = $getHisQuestions->fetch()){
          ?>
          <div class="card mt-4">
            <div class="card-header">
              <?= $question['titre'];?>
            </div>
            <div class="card-body">
            <?= $question['description'];?>
            </div>
            <div class="card-footer">
            Par <?= $question['pseudo_auteur'];?> le <?= $question['date_publication']; ?>
            </div>
          </div>
          <?php
        }
      }
    ?>
  </div>


</body>

</html>