<?php
    require('./Pokemon.php');

    $pokemon = new Pokemon("Tortank", "eau", 100, 120, "physique", 0.5, "poison");

    echo $pokemon->getName() .'<br>';
    echo $pokemon->getElement() .'<br>';
    echo $pokemon->getHp() .'<br>';
    echo $pokemon->getDamage() .'<br>';
    echo $pokemon->getType() .'<br>';
    echo $pokemon->getDamageTaux() .'<br>';
    echo $pokemon->getSecondaryEffect() .'<br>';
    echo $pokemon->getNameJoueur() .'<br>';

?>  