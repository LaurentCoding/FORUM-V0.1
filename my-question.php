<?php
  require('actions/users/securityAction.php');
  require('actions/questions/myquestionAction.php');

?>
<?php include 'includes/head.php'; ?>
<body>
  <header>
    <?php include 'includes/navbar.php'; ?> 
  </header>
<div class="container mt-4 ">
  <?php
    while($question = $getAllMyQuestions->fetch()){
      ?>
      <div class="card mb-4">
  <h5 class="card-header">
  <a href="article.php?id=<?php echo $question['id']; ?>"><?php echo $question['titre']; ?></a>
    </h5>
  <div class="card-body">
    <p class="card-text"><?php echo $question['description']; ?></p>
    <a href="article.php?id=<?php echo $question['id']; ?>" class="btn btn-primary">Accéder à la question</a>
    <a href="edit-question.php?id=<?php echo $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
    <a href="actions/questions/deleteQuestionAction.php?id=<?php echo $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
  </div>
</div>
      <?php
    }
  ?>
  </div>
  </body>
</html>