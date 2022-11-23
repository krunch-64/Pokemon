<?php
    // include './controleurs/function.php';
    
    include_once ('./modeles/DAO.php');
    include_once('./views/liste.php');
    
    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemon = $dao->getListePokemon();


   




include_once('./views/liste.php');

