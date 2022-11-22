<?php


    // Rôle : afficher la liste des pokémon
    
    // connexion du serveur web à la base MySQL
    include_once ('../modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tabPokemon = $dao->getListePokemon();
    
    // fermeture de la connexion à MySQL
    unset($dao);

    // chargement de la vue
    // include_once ('vues/VueCalendrier.php');
    for ($i=0; $i < count($tabPokemon); $i++)
    {
        echo $tabPokemon[$i]->getName() . "<br/>";
        echo json_decode($tablePokemon[$i]->getDouble_damage_from());
    }
?>