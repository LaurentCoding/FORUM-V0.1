<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){


  //V&rifier si les champs sont remplis
  if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])){

    //Les données à faire passer dans la requête
    $new_question_title = htmlspecialchars($_POST['title']);
    $new_question_description = nl2br(htmlspecialchars($_POST['description']));
    $new_question_content = nl2br(htmlspecialchars($_POST['content']));

    //Mofifier les informations de la question 
    $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
    $editQuestionOnWebsite->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

    header('Location: my-question.php');

  }else{
    $errorMsg = "Veuillez compléter tous les champs...";
  }
}