<?php
    // Rôle : afficher la liste des pokémon

    // Récupération des données de l'api
    include_once('./function.php');
    $tablePokemon = get_pokemon_stat();

    // connexion du serveur web à la base MySQL
    include_once ('../modeles/DAO.php');
    $dao = new DAO();

    // récupération du tableau des courses
    $tabCourses = $dao->getListePokemon();
    
    // Test avec paramètre
    //$maCourse = $dao->getUneCourse("Rando Muco");
    //echo "LIEU:" . $maCourse->getLieu();
    
    // fermeture de la connexion à MySQL
    unset($dao);

    // chargement de la vue
    // include_once ('vues/VueCalendrier.php');
    for ($i=0; $i < count($tabCourses); $i++)
    {
        echo $tabCourses[$i]->getName() . "<br/>";
    }
?>