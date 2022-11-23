<?php
    // afficher la liste des pokémon
    
    // connexion du serveur web à la base MySQL
    include_once ('../modeles/DAO.php');

    $dao = new DAO();

    // récupération du tableau des Pokemon
    $tablePokemonUser = $dao->getListePokemonUser();
    $tablePokemonComputer = $dao->getListePokemonComputer();
    
    // fermeture de la connexion à MySQL
    unset($dao);

    // chargement de la vue
    // include_once ('vues/VueCalendrier.php');

    // for ($i=0; $i < count($tablePokemon); $i++)
    // {
    //      echo "<hr>". $tablePokemon[0]->getName() . "<br/>";
    // }

    echo $tablePokemonUser[0]->getName() ."<br>";
    echo $tablePokemonUser[1]->getName()."<br>";
    echo $tablePokemonUser[2]->getName();
    echo "<img src='".$tablePokemonUser[0]->getImg()."' />";

    /*$u = 0;
    $c = 0;
    // for($i = 0; $i<4; $i++)
    // {
       while($tablePokemonUser[$u]->getHp() > 0 && $tablePokemonComputer[$c]->getHp() > 0)
        {       
            echo '<hr>combat:';
            echo "<hr>". $tablePokemonUser[$u]->getName() . "<br>";
            echo "faiblesse: ". json_encode($tablePokemonUser[$u]->getDouble_damage_from()) ."<br>";
            echo "defense: ".$tablePokemonUser[$u]->getDefense() ."<br>";
            echo "pv: ".$tablePokemonUser[$u]->getHp() ."<br>";
            
            echo "<hr>attaque: ".$tablePokemonUser[$u]->getDamage() ."<br>";
            echo "element: ". $tablePokemonUser[$u]->getElement();

            echo "<hr>". $tablePokemonComputer[$c]->getName() . "<br>";
            echo "faiblesse: ". json_encode($tablePokemonComputer[$c]->getDouble_damage_from()) ."<br>";
            echo "defense: ".$tablePokemonComputer[$c]->getDefense() ."<br>";
            echo "pv: ".$tablePokemonComputer[$c]->getHp() ."<br>";
            
            echo "<hr>attaque: ".$tablePokemonComputer[$c]->getDamage() ."<br>";
            echo "element: ". $tablePokemonComputer[$c]->getElement();


            $tablePokemonUser[$u]->attacked($tablePokemonComputer[$c]->getDamage(), $tablePokemonComputer[$c]->getElement());

            $tablePokemonComputer[$c]->attacked($tablePokemonUser[$u]->getDamage(), $tablePokemonUser[$u]->getElement());

            if($tablePokemonUser[$u]->getHp() <= 0 )
            {
                echo "<hr>". $tablePokemonUser[$u]->getName() ." n'a plus de vie <br>";
                echo "degat: ".$tablePokemonComputer[$u]->getDamage() *2 ."<br>";
                echo "degat reel: ".$tablePokemonUser[$u]->getDamagesSuffered() ."<br>";
                echo "defense: ".$tablePokemonUser[$u]->getDefense() ."<br>";
                echo "pv: ".$tablePokemonUser[$u]->getHp();
                $u++;
            }
            else
            {
                if($tablePokemonComputer[$c]->getHp() <= 0 )
                {
                    echo "<hr>". $tablePokemonComputer[$c]->getName() ." n'a plus de vie";
                    $c++;
                }

                echo "<hr>".$tablePokemonComputer[$c]->getName() ."<br>";
                echo "degat: ".$tablePokemonUser[$c]->getDamage() ."<br>";
                echo "degat reel: ".$tablePokemonComputer[$c]->getDamagesSuffered() ."<br>";
                echo "defense: ".$tablePokemonComputer[$c]->getDefense() ."<br>";
                echo "pv: ".$tablePokemonComputer[$c]->getHp() ."<br>";
            }
            
        } 
    // }
    */
    
    
    
?>