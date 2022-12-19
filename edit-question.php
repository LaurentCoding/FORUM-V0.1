<?php
  require('actions/users/securityAction.php');
  require('actions/questions/getInfosOfQuestionAction.php');
  require('actions/questions/editQuestionAction.php');

?>

<?php include 'includes/head.php'; ?>

<body>
  <header>
    <?php include 'includes/navbar.php'; ?>
  </header>

  <div class="container mt-4">
    <?php
      if (isset($errorMsg)) {
        echo '<p>' . $errorMsg . '</p>';
      }
    ?>
    <?php
    if(isset($question_content)){
      ?>
    <form method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
        <input type="text" class="form-control" name="title" value="<?php echo $question_title; ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description de la question</label>
        <textarea class="form-control" name="description"><?php echo $question_description; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
        <textarea class="form-control" name="content"><?php echo $question_content; ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary mb-3" name="validate">Modifier la question</button>

    </form>
    <?php
      }
    ?>
  </div>
</body>

</html>