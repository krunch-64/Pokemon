<?php 
    // connexion du serveur web à la base MySQL
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tableJoueur = $dao->getListeJoueur();
    
    // fermeture de la connexion à MySQL
    unset($dao);

    // chargement de la vue
    include_once('./views/tableau.php');


?>