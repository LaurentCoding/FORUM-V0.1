<?php
  require('actions/database.php');

  //Récupérer l'id de l'utilisateur
  if(isset($_GET['id']) && !empty($_GET['id'])){
    
    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, name, prenom FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    
    if($checkIfUserExists->rowCount() > 0) {
      //Récupérer toutes les données de l'utilisateur
      $usersInfos = $checkIfUserExists->fetch();

      $user_pseudo = $usersInfos['pseudo'];
      $user_lastname = $usersInfos['name'];
      $user_firstname = $usersInfos['prenom'];
      
      // //Récupérer toutes les questions de l'utilisateur
      $getHisQuestions = $bdd->prepare('SELECT * FROM questions where id_auteur = ? ORDER BY id DESC');
      $getHisQuestions->execute(array($idOfUser));

    }else{
      $errorMsg = "Aucun utilisateur trouvé...";
    }
  }else{
    $errorMsg = "Aucun utilisateur trouvé...";
  }