<?php session_start() ;

    if (isset($_SESSION['pkmn2_name']))

    {
        echo '<div id="health-pkmn2" class="stats-hp-100"><p class="txt-l name-pokemon">'.$_SESSION['pkmn2_name'].'</p></div>';
    }

    else

    {
        echo '<div id="health-pkmn2" class="stats-hp-100"><p class="txt-l name-pokemon">undefined</p></div>';
    }


?>






                