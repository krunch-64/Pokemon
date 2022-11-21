<?php
    require('./Pokemon.php');

    $pokemon = new Pokemon("Tortank", "eau", 100);

    echo $pokemon->getName();
    echo $pokemon->getElement();
    echo $pokemon->getHp();

?>