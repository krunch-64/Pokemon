<?php
// Rôle : fournit les méthodes d'accès à la db au moyen de l'objet PDO

// liste des méthodes :

// __construct() : le constructeur crée la connexion $cnx à la base de données
// __destruct() : le destructeur ferme la connexion $cnx à la base de données

// inclusion des paramètres de l'application et de la classe Course
include_once('param.php');
require_once('../modeles/Pokemon.php');

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
    
    // Créer un nouveau pokémon
    public function insertPokemon()
    {
        $txt_req = "INSERT INTO `pokemon` (pokemon_id, pokemon_name, pokemon_element, pokemon_element2, pokemon_hp, pokemon_attack, pokemon_defense)";
        $txt_req .= "VALUES ('14', 'salameche', 'feu', 'dragon', '90', '100', '50')";

        $req = $this->cnx->exec($txt_req);
        echo $req;
    }

    // retourne la liste des Pokemons sous forme de tableau d'objets
    public function getListePokemon()
    {
        // Tableau de Pokemons
        $lesPokemons = array();
        
        $i = 0;
        
        // préparation de la requête de recherche
        $txt_req = "Select pokemon_name, pokemon_element, pokemon_element2, pokemon_hp, pokemon_attack, pokemon_defense";
        $txt_req .= " from pokemon";

        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        // $req->bindValue("param1", $param1, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        while ($uneLigne = $req->fetch(PDO::FETCH_OBJ))
        {
        
            // création d'un objet Pokemon (encodage pour la sécurité)
            $pokemon_name = utf8_encode($uneLigne->pokemon_name);
            $pokemon_element = utf8_encode($uneLigne->pokemon_element);
            $pokemon_element2 = utf8_encode($uneLigne->pokemon_element2);
            $pokemon_hp = utf8_encode($uneLigne->pokemon_hp);
            $pokemon_damage = utf8_encode($uneLigne->pokemon_attack);
            $pokemon_defense = utf8_encode($uneLigne->pokemon_defense);
             
            $unePokemon = new Pokemon($pokemon_name, $pokemon_element, $pokemon_element2, $pokemon_hp, $pokemon_damage, $pokemon_defense);
            $lesPokemons[$i] = $unePokemon;
            $i++;
        }
        return $lesPokemons;
    }
}

?>