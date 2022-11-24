<?php 
    session_start();
    // print_r($_SESSION);
    // connexion du serveur web à la base MySQL
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    // $list_id = list_checkbox();

    // function list_checkbox () 
    // {
    //     $table = array();

    //     for ($i=0 ; $i < 24 ; $i++) {
    //         if (isset($_POST[$i])) {
    //             array_push($table, $i);
    //         }
            
    //     }
    //     return $table;
    // }

    // var_dump($list_id);
    // récupération du tableau des Pokemon
    $tablePokemonUser = $dao->getListePokemonUser();
    $tablePokemonComputer = $dao->getListePokemonComputer();
    
    // fermeture de la connexion à MySQL
    unset($dao);
    
    $_SESSION['pkmn1_increment'] = 0;
    $_SESSION['pkmn2_increment'] = 0;



    // chargement de la vue arena
    include_once('./views/arena.php');
?>