<?php
// Rôle : fournit les méthodes d'accès à la db au moyen de l'objet PDO

// liste des méthodes :

// __construct() : le constructeur crée la connexion $cnx à la base de données
// __destruct() : le destructeur ferme la connexion $cnx à la base de données

// inclusion des paramètres de l'application et de la classe Course
include_once('param.php');
require_once('./modeles/Pokemon.php');
require_once('./modeles/Joueur.php');

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
    public function insertPokemon($tablePokemon)
    {
        $null = 'NULL';

        $txt_req = "INSERT INTO `pokemon` (pokemon_id, pokemon_name, pokemon_element, pokemon_element2, pokemon_hp, pokemon_attack, pokemon_defense, pokemon_damage_from, pokemon_damage_to)";
        $txt_req .= "VALUES (:pokemon_id, :pokemon_name, :pokemon_element, :pokemon_element2, :pokemon_hp, :pokemon_attack, :pokemon_defense, :pokemon_damage_from, :pokemon_damage_to)";

        $stmt = $this->cnx->prepare($txt_req);

        $stmt->bindParam(':pokemon_id', $tablePokemon["id"]);
        $stmt->bindParam(':pokemon_name', $tablePokemon["name"]);
        $stmt->bindParam(':pokemon_element', $tablePokemon["element_primary"]);
        if($tablePokemon["element_secondary"] != NULL)
        {
            $stmt->bindParam(':pokemon_element2', $tablePokemon["element_secondary"]);
        }
        else
        {
            $stmt->bindParam(':pokemon_element2', $null);
        }
        $stmt->bindParam(':pokemon_hp', $tablePokemon["pv"]);
        $stmt->bindParam(':pokemon_attack', $tablePokemon["attack"]);
        $stmt->bindParam(':pokemon_defense', $tablePokemon["defense"]);
        $tablePokemon["double_damage_from"] = json_encode($tablePokemon["double_damage_from"]);
        $tablePokemon["double_damage_to"] = json_encode($tablePokemon["double_damage_to"]);
        $stmt->bindParam(':pokemon_damage_from', $tablePokemon["double_damage_from"]);
        $stmt->bindParam(':pokemon_damage_to', $tablePokemon["double_damage_to"]);

        var_dump($stmt);
        $stmt->execute();
        return $stmt->rowCount();
        
    }

    // Créer un nouveau pokémon
    public function insertJoueur($tableJoueur)
    {
        $txt_req = "INSERT INTO `joueur` (`joueur_id`, `joueur_name`, `joueur_score`, `date`)";
        $txt_req .= "VALUES (:joueur_id, :joueur_name, :joueur_score, :date)";

        $stmt = $this->cnx->prepare($txt_req);

        $stmt->bindParam(':joueur_id', $tableJoueur["id"]);
        $stmt->bindParam(':joueur_name', $tableJoueur["name"]);
        $stmt->bindParam(':joueur_score', $tableJoueur["score"]);
        $stmt->bindParam(':date', $tableJoueur["date"]);

        var_dump($stmt);
        $stmt->execute();
        return $stmt->rowCount();
        
    }

    // retourne la liste des Pokemons de l'utilisateur sous forme de tableau d'objets
    public function getListePokemonUser()
    {
        // Tableau de Pokemons
        $lesPokemonsUser = array();
        
        $i = 0;
        
        // préparation de la requête de recherche
        $txt_req = "Select pokemon_id, pokemon_name, pokemon_element, pokemon_element2, pokemon_hp, pokemon_attack, pokemon_defense, pokemon_damage_from, pokemon_damage_to, pokemon_img";
        $txt_req .= " from pokemon";
        $txt_req .= " WHERE pokemon_id = 1 OR pokemon_id = 2 OR pokemon_id = 3";

        // faire juste quand le pokemon est utiliser /* where personne_id =id */

        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        // $req->bindValue("param1", $param1, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        while ($uneLigne = $req->fetch(PDO::FETCH_OBJ))
        {
        
            // création d'un objet Pokemon
            $pokemon_id = $uneLigne->pokemon_id;
            $pokemon_name = $uneLigne->pokemon_name;
            $pokemon_element = $uneLigne->pokemon_element;
            $pokemon_element2 = $uneLigne->pokemon_element2;
            $pokemon_hp = $uneLigne->pokemon_hp;
            $pokemon_damage = $uneLigne->pokemon_attack;
            $pokemon_defense = $uneLigne->pokemon_defense;
            $pokemon_damage_from = $uneLigne->pokemon_damage_from;
            $pokemon_damage_to = $uneLigne->pokemon_damage_to;
            $pokemon_img = $uneLigne->pokemon_img;
             
            $unePokemon = new Pokemon($pokemon_id, $pokemon_name, $pokemon_element, $pokemon_element2, $pokemon_hp, $pokemon_damage, $pokemon_defense, json_decode($pokemon_damage_from), json_decode($pokemon_damage_to), $pokemon_img);
            $lesPokemonsUser[$i] = $unePokemon;
            $i++;
        }
        return $lesPokemonsUser;
    }

    // retourne la liste des Pokemons de l'ordi sous forme de tableau d'objets
    public function getListePokemonComputer()
    {
        // Tableau de Pokemons
        $lesPokemonsComputer = array();
        
        $i = 0;
        
        // préparation de la requête de recherche
        $txt_req = "Select pokemon_id, pokemon_name, pokemon_element, pokemon_element2, pokemon_hp, pokemon_attack, pokemon_defense, pokemon_damage_from, pokemon_damage_to, pokemon_img";
        $txt_req .= " from pokemon";
        $txt_req .= " WHERE pokemon_id = 4 OR pokemon_id = 5 OR pokemon_id = 6";

        // faire juste quand le pokemon est utiliser /* where personne_id =id */ 

        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        // $req->bindValue("param1", $param1, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        while ($uneLigne = $req->fetch(PDO::FETCH_OBJ))
        {
        
            // création d'un objet Pokemon
            $pokemon_id = $uneLigne->pokemon_id;
            $pokemon_name = $uneLigne->pokemon_name;
            $pokemon_element = $uneLigne->pokemon_element;
            $pokemon_element2 = $uneLigne->pokemon_element2;
            $pokemon_hp = $uneLigne->pokemon_hp;
            $pokemon_damage = $uneLigne->pokemon_attack;
            $pokemon_defense = $uneLigne->pokemon_defense;
            $pokemon_damage_from = $uneLigne->pokemon_damage_from;
            $pokemon_damage_to = $uneLigne->pokemon_damage_to;
            $pokemon_img = $uneLigne->pokemon_img;
             
            $unePokemon = new Pokemon($pokemon_id, $pokemon_name, $pokemon_element, $pokemon_element2, $pokemon_hp, $pokemon_damage, $pokemon_defense, json_decode($pokemon_damage_from), json_decode($pokemon_damage_to), $pokemon_img);
            $lesPokemonsComputer[$i] = $unePokemon;
            $i++;
        }
        return $lesPokemonsComputer;
    }

    //retourne la liste des joueurs sous forme de tableau d'objet
    public function getListeJoueur()
    {
        // Tableau de Joueurs
        $lesJoueurs = array();
        
        $i = 0;
        
        // préparation de la requête de recherche
        $txt_req = "Select joueur_id, joueur_name, joueur_score, date";
        $txt_req .= " from joueur";


        $req = $this->cnx->prepare($txt_req);
        
        // liaison de la requête et de ses paramètres
        // $req->bindValue("param1", $param1, PDO::PARAM_STR);
        
        // extraction des données
        $req->execute();
        
        
        // traitement de la réponse
        while ($uneLigne = $req->fetch(PDO::FETCH_OBJ))
        {
        
            // création d'un objet joueur
            $joueur_id = $uneLigne->joueur_id;
            $joueur_name = $uneLigne->joueur_name;
            $joueur_score = $uneLigne->joueur_score;
            $date = $uneLigne->date;
             
            $unJoueur = new Joueur($joueur_id, $joueur_name, $joueur_score, $date);
            $lesJoueurs[$i] = $unJoueur;
            $i++;
        }
        return $lesJoueurs;
    }
}

?>