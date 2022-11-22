<?php

trait Joueur
{
    /**
     * Identifiant du joueur
     * @var int
     */
    protected $id;

    /**
     * Nom du jouer 
     * @var string
     */
    protected $nameJoueur = "bruno";

    /**
     * score du joueur
     * @var int
     */
    protected $score;

    /**
     * date du jeu
     * @var string
     */
    protected $date;

    /**
     * Construct de la class Joueur
     * @param int $id
     * @param string $nameJoueur
     * @param int $score
     * @param string $date
     */
    public function __construct(int $id, string $nameJoueur, int $score, string $date)
    {
        $this->id = $id;
        $this->nameJoueur = $nameJoueur;
        $this->score = $score;
        $this->date = $date;
    }

    
    // GETTER ET SETTER
	/**
	 * Identifiant du joueur
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Identifiant du joueur
	 * @param int $id Identifiant du joueur
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
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
}
?>