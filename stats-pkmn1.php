<?php session_start() ;

    if (isset($_SESSION['pkmn1_name']))

    {
        echo '<div id="health-pkmn1" class="stats-hp-100"><p class="txt-l name-pokemon">'.$_SESSION['pkmn1_name'].'</p></div>';
    }

    else

    {
        echo '<div id="health-pkmn1" class="stats-hp-100"><p class="txt-l name-pokemon">undefined</p></div>';
    }


?>






