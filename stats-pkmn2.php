<?php session_start() ;
    include_once('./functions/bar-life.php');

    if (isset($_SESSION['pkmn2_name']))

    {
        echo '<div id="health-pkmn2" class="stats-hp-'. get_life_for_bar($_SESSION['pkmn2_health_base'], $_SESSION['pkmn2_health']) .'"><p class="txt-l name-pokemon">'.$_SESSION['pkmn2_name'].'</p></div>';
    }

    else

    {
        echo '<div id="health-pkmn2" class="stats-hp-100"><p class="txt-l name-pokemon">undefined</p></div>';
    }


?>






                