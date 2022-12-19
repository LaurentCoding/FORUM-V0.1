<?php
//Vérifeir si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth'])){
  header('Location: ../../login.php');
}

require('../database.php');

//Vérifier si l'id est rentré en paramétre dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){

  //L'id de la question en paramétre
  $idOfTheQuestion = $_GET['id'];

  //Vérifier si la question existe
  $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
  $checkIfQuestionExists->execute(array($idOfTheQuestion));

  if($checkIfQuestionExists->rowCount() > 0){

    //Récupérer les indfos de la questions
    $questionsInfos = $checkIfQuestionExists->fetch();
    if($questionsInfos['id_auteur'] == $_SESSION['id']){

      //Supprimer la question en fonction de son id rentrée en paramétre
      $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
      $deleteThisQuestion->execute(array($idOfTheQuestion));

      header('Location: ../../my-question.php');

    }else{
      echo "Vous n'avez pas le droit de supprimer une question ne vous appartenant pas!";
    }

  }else{
    echo "Aucune question n'a été trouvée";
  }

}else{
  echo "Aucune question n'a été trouvée";
}