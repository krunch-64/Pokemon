<?php
    // afficher la liste des pokémon
    
    // connexion du serveur web à la base MySQL
    include_once ('../modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemon = $dao->getListePokemon();
    
    // fermeture de la connexion à MySQL
    unset($dao);

    // chargement de la vue
    // include_once ('vues/VueCalendrier.php');

    for ($i=0; $i < count($tablePokemon); $i++)
    {
        echo $tablePokemon[$i]->getName() . "<br/>";
        for($n=0; $n<count($tablePokemon[$i]->getDouble_damage_from()); $n++)
        {
            echo json_encode($tablePokemon[$i]->getDouble_damage_from()[$n]) ."<br/>";
        }
    }
?>