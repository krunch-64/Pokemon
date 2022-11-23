<?php 

// Fonction pour la barre de vie

    function get_life_for_bar ($max_life,$life)

    {
        return (round((20 * $life) / $max_life))*5;
    }

    echo get_life_for_bar ($max_life,$life);


?>