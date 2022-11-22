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

    // for ($i=0; $i < count($tablePokemon); $i++)
    // {
        echo "<hr>". $tablePokemon[0]->getName() . "<br/>";
    // }
    echo "faiblesse: ". json_encode($tablePokemon[0]->getDouble_damage_from()) ."<br>";
    echo "defense: ".$tablePokemon[0]->getDefense() ."<br>";
    echo "pv: ".$tablePokemon[0]->getHp() ."<br>";

    // $element = $tablePokemon[3]->getElement();
    // $degat = $tablePokemon[3]->getDamage();

    // for($n=0; $n<count($tablePokemon[0]->getDouble_damage_from()); $n++)
    // {
    //     if('"'.$element.'"' == json_encode($tablePokemon[0]->getDouble_damage_from()[$n]))
    //     {
    //         $degat = $degat * 2;
    //         echo $degat ."<br>";
    //         break;
    //     }
    //     echo $degat."<br>";
    // }

    // echo $tablePokemon[3]->getName() . "<br/>";

    $tablePokemon[0]->attacked($tablePokemon[3]->getDamage(), $tablePokemon[3]->getElement());

    echo "<hr>attaque: ".$tablePokemon[3]->getDamage() ."<br>";
    echo "element: ". $tablePokemon[3]->getElement();

    echo "<hr> degat reel: ".$tablePokemon[0]->getDamagesSuffered() ."<br>";
    echo "defense: ".$tablePokemon[0]->getDefense() ."<br>";
    echo "pv: ".$tablePokemon[0]->getHp() ."<br>";
?>