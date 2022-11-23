<?php 
if (!isset($_GET['action']))
{
    $action = 'accueil';
}
else
{
    $action = $_GET['action'];
}
switch($action){
	case 'accueil': {
		include_once ('controleurs/CtrlAccueil.php'); break;
	}
	case 'list': {
		include_once ('controleurs/CtrlList.php'); break;
	}
	case 'arena': {
	    include_once ('controleurs/CtrlArena.php'); break;
	}
	case 'score': {
		include_once ('controleurs/CtrlTableaux.php'); break;
	}
	case 'arena': {
		include_once ('controleurs/CtrlArena.php'); break;
	}
	default : {
		// toute autre tentative est automatiquement redirigée vers l'accueil de l'application
		include_once ('controleurs/CtrlAccueil.php'); break;
	}
}