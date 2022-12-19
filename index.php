<?php
session_start();
require('actions/questions/showAllQuestionAction.php');
?>
<?php include 'includes/head.php'; ?>

<body>
  <?php include 'includes/navbar.php'; ?>
  <main>

    <div class="container mt-4">
      <form method="GET">
        <div class="form-group row">
          <div class="col-8">
            <input type="search" name="search" class="form-control">
          </div>
          <div class="col-4">
            <button class="btn btn-success" type="submit">Rechercher</button>
          </div>
        </div>
      </form>
      <?php
        while($question = $getAllQuestions->fetch()){
          ?>
          <div class="card mt-4">
            <div class="card-header">
              <a href="article.php?id=<?php echo $question['id']; ?>"><?php echo $question['titre']; ?></a>
            </div>
            <div class="card-body">
            <?php echo $question['description']; ?>
            </div>
            <div class="card-footer">
                Publié par <a href="profil.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur']; ?></a> le <?= $question['date_publication']; ?>
            </div>
            </div>
          <?php
        }
      ?>
    </div>
  </main>

</body>

</html>