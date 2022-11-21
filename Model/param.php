<?php
// Rôle : inclure les paramètres de l'application (hébergement en localhost)

// paramètres de connexion -----------------------------------------------------------------------------------
global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
$PARAM_HOTE = "localhost";		// si le sgbd est sur la même machine que le serveur php
$PARAM_PORT = "3306";			// le port utilisé par défaut par le serveur MySql
$PARAM_BDD = "pokemon";		    // nom de la base de données
$PARAM_USER = "root";		// nom de l'utilisateur (à créer)
$PARAM_PWD = "";		// son mot de passe