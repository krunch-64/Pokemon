<?php
    // Récupération des données de l'api
    include_once('./controleurs/function.php');

    // connexion du serveur web à la base MySQL
    include_once ('./modeles/DAO.php');

    $i = 1;
    while ($i <=24)
    {
        $tablePokemon = (array) get_pokemon_stat($i);
        $dao = new DAO();
        // var_dump($tablePokemon);
        // var_dump(json_encode($tablePokemon["double_damage_from"]));
        
        $ex = $dao->insertPokemon($tablePokemon);
        echo $ex;

        $i++;
    }
    
    // var_dump($tablePokemon);

?>