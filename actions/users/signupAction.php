<?php
session_start();
require ('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

  //Vérifier si l'utilisateur a bien complété tous les champs
  if(!empty($_POST['pseudo']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password'])){
    
    //Les données de l'users
    $user_pseudo = htmlspecialchars($_POST['pseudo']);
    $user_lastname = htmlspecialchars($_Post['lastname']);
    $user_firstname = htmlspecialchars($_POST['firstname']);
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //Vérifier si le users existe déjà
    $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
    $checkIfUserAlreadyExists->execute(array($user_pseudo));

    if($checkIfUserAlreadyExists->rowCount() == 0 ){

      //Insérer le user dans la bdd
      $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, name, prenom, mdp) VALUES (?, ?, ?, ?)');
      $insertUserOnWebsite->execute(array($user_pseudo, $user_last_name, $user_firstname, $user_password));

      //Récupérer les données de l'user
      $getInfoOfThisUserReq = $bdd->prepare('SELECT id, pseudo, name, prenom FROM users WHERE name = ? AND prenom = ? AND pseudo = ?');
      $getInfoOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

      $usersInfos = $getInfoOfThisUserReq->fetch();
      
      //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales
      $_SESSION['auth'] = true;
      $_SESSION['id'] = $usersInfos['id'];
      $_SESSION['lastname'] = $usersInfos['name'];
      $_SESSION['firstname'] = $usersInfos['prenom'];
      $_SESSION['pseudo'] = $usersInfos['pseudo'];

      header('Location: index.php');

    }else{
      $errorMsg = "L'utilisateur existe déjà sur le site";
    }

  }else{
    $errorMsg = 'Veuillez compléter tous les champs...';
  }
}