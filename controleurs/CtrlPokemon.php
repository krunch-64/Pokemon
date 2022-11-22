<?php
    // Rôle : afficher la liste des pokémon

    $dao = new DAO();

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