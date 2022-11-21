<?php
    require('./Pokemon.php');

    $pokemon = new Pokemon("Tortank", "eau", 100);

    echo $pokemon->getName() .'<br>';
    echo $pokemon->getElement() .'<br>';
    echo $pokemon->getHp() .'<br>';
    echo $pokemon->getNameJoueur() .'<br>';

?>  