<?php

session_start();
require('actions/questions/showArticleContentAction.php');
require('actions/questions/postAnswerAction.php');
require('actions/questions/showAllAnswersOfQuestionAction.php');
?>

<?php include 'includes/head.php'; ?>

<body>
  <header>
    <?php include 'includes/navbar.php'; ?>
  </header>
  <div class="container mt-4">

    <?php

    if (isset($errorMsg)) {
      echo $errorMsg;
    }
    if (isset($question_publication_date)) {
    ?>
      <section class="show-content">
        <h3><?= $question_title; ?></h3>
        <hr />
        <p><?= $question_content; ?></p>
        <hr />
        <small><?= '<a href="profil.php?id='.$question_id_author.'">'.$question_pseudo_author . '</a>' . $question_publication_date; ?></small>
      </section>
      <section class="show-answers mt-4">
        <form class="form-group" method="POST">
          <label class="mb-3">Réponse :</label>
          <textarea class="form-control" name="answer"></textarea>
          <button class="btn btn-primary mt-4" type="submit" name="validate">Répondre</button>
        </form>

        <?php
          
          while($answer = $getAllAnswersOfThisQuestion->fetch()){
            ?>
              <div class="card mt-4">
                <div class="card-header">
                <a href="profil.php?id=<?= $answer['id_auteur']; ?>">
                                        <?= $answer['pseudo_auteur']; ?>
                                    </a>
                </div>
                <div class="card-body">
                  <?= $answer['contenu']; ?>
                </div>
              </div>
            <?php
          }
        ?>
      </section>



    <?php
    }
    ?>


  </div>


</body>

</html>