<?php 
if (!isset($_GET['action']))
{
    $action = 'Accueil';
}
else
{
    $action = $_GET['action'];
}
switch($action){
	case 'Accueil': {
		include_once ('controleurs/CtrlAccueil.php'); break;
	}
	case 'Arena': {
	    include_once ('controleurs/CtrlArena.php'); break;
	}
	case 'Tableaux': {
		include_once ('controleurs/CtrlTableaux.php'); break;
	}
	default : {
		// toute autre tentative est automatiquement redirigée vers l'accueil de l'application
		include_once ('controleurs/CtrlAccueil.php'); break;
	}
}