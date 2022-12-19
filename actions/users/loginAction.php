<?php
session_start();
require ('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

  //Vérifier si l'utilisateur a bien complété tous les champs
  if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
    
    //Les données de l'users
    $user_pseudo = htmlspecialchars($_POST['pseudo']);
    $user_password = htmlspecialchars($_POST['password']);

    $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
    $checkIfUserExists->execute(array($user_pseudo));
    
    if($checkIfUserExists->rowCount() > 0 ){

      $usersInfos = $checkIfUserExists->fetch();
      if(password_verify($user_password, $usersInfos['mdp'])){

        //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales
      $_SESSION['auth'] = true;
      $_SESSION['id'] = $usersInfos['id'];
      $_SESSION['lastname'] = $usersInfos['name'];
      $_SESSION['firstname'] = $usersInfos['prenom'];
      $_SESSION['pseudo'] = $usersInfos['pseudo'];

      header('Location: index.php');
      
      }else{
        $errorMsg = 'Votre mot de passe est incorrect';
      }

    }else {
      $errorMsg = 'Votre pseudo est incorrect';
    }
  }else{
    $errorMsg = 'Veuillez compléter tous les champs...';
  }
}