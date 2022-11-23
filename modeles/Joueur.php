<?php

trait Joueur
{
    /**
     * Identifiant du joueur
     * @var int
     */
    protected $idJoueur = 1;

    /**
     * Nom du jouer 
     * @var string
     */
    protected $nameJoueur = 'Guest1';

    /**
     * score du joueur
     * @var int
     */
    protected $score = 0;

    /**
     * date du jeu
     * @var string
     */
    protected $date = '23/11';

	/**
	 * pokemon du joueurs durant la partie
	 * @var array
	 */
	protected $pokemon_user = [];

    /**
     * Construct de la class Joueur
     * @param int $idJoueur
     * @param string $nameJoueur
     * @param int $score
     * @param string $date
	 * @param array $pokemon_user
     */
    public function __construct(int $idJoueur, string $nameJoueur, int $score, string $date)
    {
        $this->idJoueur = $idJoueur;
        $this->nameJoueur = $nameJoueur;
        $this->score = $score;
        $this->date = $date;
    }

    
    // GETTER ET SETTER
	/**
	 * Identifiant du joueur
	 * @return int
	 */
	public function getIdJoueur() {
		return $this->idJoueur;
	}
	
	/**
	 * Identifiant du joueur
	 * @param int $idJoueur Identifiant du joueur
	 * @return self
	 */
	public function setId($idJoueur): self {
		$this->idJoueur = $idJoueur;
		return $this;
	}

	/**
	 * Nom du jouer
	 * @return string
	 */
	public function getNameJoueur() {
		return $this->nameJoueur;
	}
	
	/**
	 * Nom du jouer
	 * @param string $nameJoueur Nom du jouer
	 * @return self
	 */
	public function setNameJoueur($nameJoueur): self {
		$this->nameJoueur = $nameJoueur;
		return $this;
	}

	/**
	 * score du joueur
	 * @return int
	 */
	public function getScore() {
		return $this->score;
	}
	
	/**
	 * score du joueur
	 * @param int $score score du joueur
	 * @return self
	 */
	public function setScore($score): self {
		$this->score = $score;
		return $this;
	}

	/**
	 * date du jeu
	 * @return string
	 */
	public function getDate() {
		return $this->date;
	}
	
	/**
	 * date du jeu
	 * @param string $date date du jeu
	 * @return self
	 */
	public function setDate($date): self {
		$this->date = $date;
		return $this;
	}

	/**
	 * les 3 pokemons du joueur durant sa partie
	 * @param string $pokemon 
	 * @return self
	 */
	public function setPokemon_user($pokemon): self {
		$this->pokemon_user = $pokemon;
		return $this;
	}

	/**
	 * Les 3 pokemons du joueur durant sa partie
	 * @return array
	 */
	public function getPokemon_user() {
		return $this->pokemon_user;
	}
}
?>