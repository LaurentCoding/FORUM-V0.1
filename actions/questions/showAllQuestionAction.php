<?php

require('actions/database.php');

  //Récupérer les questions par défault sans recherche
  $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 5');

  //Vérifier si une recherche a été rentré par l'utilisateur
  if(isset($_GET['search']) && !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

  }