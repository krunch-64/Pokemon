<?php 
    session_start();
    // connexion du serveur web à la base MySQL
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    $list_id = list_checkbox();

    function list_checkbox () 
    {
        $table = array();

        for ($i=0 ; $i < 24 ; $i++) {
            if (isset($_POST[$i])) {
                array_push($table, $i);
            }
            
        }
        return $table;
    }

    // récupération du tableau des Pokemon
    $tablePokemonUser = $dao->getListePokemonUser($list_id);
    $tablePokemonComputer = $dao->getListePokemonComputer();

    // fermeture de la connexion à MySQL
    unset($dao);


    if (isset($_GET['fight_action']))

    {
        if ($_GET['fight_action'] == 'attack1')

        {
            while($tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp() > 0 && $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getHp() > 0)
            {    
                if($tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp() <= 0)
                {
                    $_SESSION['pkmn1_increment']++;
                }
                else
                {
                    $previous_health_PKMN1 = $tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp();

                    $previous_health_PKMN2 = $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getHp();


                    

                    $tablePokemonUser[$_SESSION['pkmn1_increment']]->attacked($tablePokemonComputer[$_SESSION['pkmn2_increment']]->getDamage(), $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getElement());

                    $tablePokemonComputer[$_SESSION['pkmn2_increment']]->attacked($tablePokemonUser[$_SESSION['pkmn1_increment']]->getDamage(), $tablePokemonUser[$_SESSION['pkmn1_increment']]->getElement());


                    $new_health_PKMN1 = $tablePokemonUser[$_SESSION['pkmn1_increment']]->getHp();

                    $new_health_PKMN2 = $tablePokemonComputer[$_SESSION['pkmn2_increment']]->getHp();

        
                    
                    $_SESSION['pkmn1_health'] -= (float) $previous_health_PKMN1 - (float) $new_health_PKMN1;

                    echo 'session :'.$_SESSION['pkmn1_health'];

                    $_SESSION['pkmn2_health'] -= (float) $previous_health_PKMN2 - (float) $new_health_PKMN2;

                    echo 'session :'.$_SESSION['pkmn2_health'];
                }
                
            }

            
        }

        if ($_GET['fight_action'] == 'pkmn1')

        {
            // $_SESSION['pkmn1_increment'] = 1;
        }

        if ($_GET['fight_action'] == 'pkmn2')

        {
            // $_SESSION['pkmn1_increment'] = 2;
        }
    }
?>


