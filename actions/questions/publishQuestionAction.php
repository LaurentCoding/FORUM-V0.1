<?php 
session_start();
require('actions/database.php');

//Valider le formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vide
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])){


      //Les données de la question
      $question_title = htmlspecialchars($_POST['title']);
      $question_description = nl2br(htmlspecialchars($_POST['description']));
      $question_content = nl2br(htmlspecialchars($_POST['content']));
      $question_date = date('d/m/Y');
      $question_id_author = $_SESSION['id'];
      $question_pseudo_author = $_SESSION['pseudo'];

      //Insérer la question sur le questionnaire
      $insertQUestionOnWebsite = $bdd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES(?,?,?,?,?,?)');
      $insertQUestionOnWebsite->execute(
        array(
          $question_title, 
          $question_description, 
          $question_content, 
          $question_id_author, 
          $question_pseudo_author, 
          $question_date
        )
      );

      $succssMsg = ' Votre question a bien été publiée sur le site';


    }else{
      $errorMsg = 'Veillez compléter tous les champs...';
    }
}