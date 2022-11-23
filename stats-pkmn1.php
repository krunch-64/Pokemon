<?php session_start() ;
    include_once('./functions/bar-life.php');

    if (isset($_SESSION['pkmn1_name']))

    {
        echo '<div id="health-pkmn1" class="stats-hp-'. get_life_for_bar($_SESSION['pkmn1_health_base'], $_SESSION['pkmn1_health']) .'"><p class="txt-l name-pokemon">'.$_SESSION['pkmn1_name'].'</p></div>';
    }

    else

    {
        echo '<div id="health-pkmn1" class="stats-hp-100"><p class="txt-l name-pokemon">undefined</p></div>';
    }
?>






                