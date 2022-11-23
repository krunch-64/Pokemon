<?php 
    session_start();
    // print_r($_SESSION);
    // connexion du serveur web à la base MySQL
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemonUser = $dao->getListePokemonUser();
    $tablePokemonComputer = $dao->getListePokemonComputer();
    
    // fermeture de la connexion à MySQL
    unset($dao);
    
    $u = 0;
    $c = 0;

    // chargement de la vue arena
    include_once('./views/arena.php');
?>