<?php
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

?>