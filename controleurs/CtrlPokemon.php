<?php
    // Rôle : afficher la liste des pokémon

    // Récupération des données de l'api
    include_once('./function.php');

    // connexion du serveur web à la base MySQL
    include_once ('../modeles/DAO.php');

    $i = 1;
    while ($i <=24)
    {
        $tablePokemon = get_pokemon_stat($i);
        $dao = new DAO();
        
        $ex = $dao->insertPokemon($tablePokemon);
        echo $ex;

        $i++;
    }

    // var_dump($tablePokemon);

    $dao = new DAO();

    // $ex = $dao->insertPokemon($tablePokemon);
    // echo $ex;

    // récupération du tableau des courses
    $tabCourses = $dao->getListePokemon();
    
    // fermeture de la connexion à MySQL
    unset($dao);

    // chargement de la vue
    // include_once ('vues/VueCalendrier.php');
    for ($i=0; $i < count($tabCourses); $i++)
    {
        echo $tabCourses[$i]->getName() . "<br/>";
    }
?>