<?php 
    session_start();
    // connexion du serveur web à la base MySQL
    include_once ('./modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemonUser = $dao->getListePokemonUser();
    $tablePokemonComputer = $dao->getListePokemonComputer();

    // fermeture de la connexion à MySQL
    unset($dao);

    $u = 0;
    $c = 0;

    if (isset($_GET['fight_action']))

    {
        if ($_GET['fight_action'] == 'attack1')

        {
            while($tablePokemonUser[$u]->getHp() > 0 && $tablePokemonComputer[$c]->getHp() > 0)
            {    
                if($tablePokemonUser[$u]->getHp() <= 0)
                {
                    $u++;
                }
                else
                {
                    $previous_health_PKMN1 = $tablePokemonUser[$u]->getHp();

                    $previous_health_PKMN2 = $tablePokemonComputer[$c]->getHp();


                    

                    $tablePokemonUser[$u]->attacked($tablePokemonComputer[$c]->getDamage(), $tablePokemonComputer[$c]->getElement());

                    $tablePokemonComputer[$c]->attacked($tablePokemonUser[$u]->getDamage(), $tablePokemonUser[$u]->getElement());


                    $new_health_PKMN1 = $tablePokemonUser[$u]->getHp();

                    $new_health_PKMN2 = $tablePokemonComputer[$c]->getHp();

        
                    
                    $_SESSION['pkmn1_health'] -= (float) $previous_health_PKMN1 - (float) $new_health_PKMN1;

                    echo 'session :'.$_SESSION['pkmn1_health'];

                    $_SESSION['pkmn2_health'] -= (float) $previous_health_PKMN2 - (float) $new_health_PKMN2;

                    echo 'session :'.$_SESSION['pkmn2_health'];
                }
                
            }

            
        }

        if ($_GET['fight_action'] == 'pkmn1')

        {
            echo 'g';
        }

        if ($_GET['fight_action'] == 'pkmn2')

        {
            echo 'ee';
        }
    }
?>


