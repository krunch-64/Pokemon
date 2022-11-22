<?php
// Rôle : fournit les méthodes d'accès à la db au moyen de l'objet PDO

// liste des méthodes :

// __construct() : le constructeur crée la connexion $cnx à la base de données
// __destruct() : le destructeur ferme la connexion $cnx à la base de données

// inclusion des paramètres de l'application et de la classe Course
require_once('param.php');
require_once('./Pokemon.php');

// début de la classe DAO (Data Access Object)
class DAO
{
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Membres privés de la classe ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    
    // la connexion à la base de données
    private $cnx;
    
    // ------------------------------------------------------------------------------------------------------
    // ---------------------------------- Constructeur et destructeur ---------------------------------------
    // ------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
        try
        {	
            // nouvelle connexion bdd
            $this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD, $PARAM_USER, $PARAM_PWD);
            return true;
        }
        catch (Exception $ex)
        {
            echo ("Echec de la connexion a la base de donnees <br>");
            echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
            echo ("PARAM_HOTE = " . $PARAM_HOTE);
            return false;
        }
    }
    
    public function __destruct()
    {
        // ferme la connexion à MySQL :
        unset($this->cnx);
    }
    
    // ------------------------------------------------------------------------------------------------------
    // -------------------------------------- Méthodes d'instances ------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    
    /*// retourne la course sous forme d'objet
    public function getUneCourse(string $pnom)
    {

        // préparation de la requête de recherche
        $txt_req = "Select nom, lieu, date, heureDepart, distance, prix, challenge";
        $txt_req .= " from course";
        $txt_req .= " where nom = :nom";
        echo $txt_req;

        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        $req->bindValue("nom", $pnom, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        $uneLigne = $req->fetch(PDO::FETCH_OBJ);
        // création d'un objet Course (encodage pour la sécurité)
        $unNom = utf8_encode($uneLigne->nom);
        $unLieu = utf8_encode($uneLigne->lieu);
        $uneDate = utf8_encode($uneLigne->date);
        $uneHeureDepart = utf8_encode($uneLigne->heureDepart);
        $uneDistance = utf8_encode($uneLigne->distance);
        $unPrix = utf8_encode($uneLigne->prix);
        $unChallenge = utf8_encode($uneLigne->challenge);

        $uneCourse = new Course($unNom, $unLieu, $uneDate, $uneHeureDepart, $uneDistance, $unPrix, $unChallenge);

        return $uneCourse;
    }*/

}

?>