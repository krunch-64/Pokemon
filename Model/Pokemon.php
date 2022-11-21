<?php

require('./Joueur.php');
require('./Attack.php');

class Pokemon extends Attack
{
    /**
     * import les fonctions des Joueurs
     */
    use Joueur;

    /**
     * Nom du Pokémon
     * @var string
     */
    protected $name;

    /**
     * Élèment du Pokémon
     * @var string
     */
    protected $element;

    /**
     * PV du Pokémon
     * @var int
     */
    protected $hp;

    /**
     * Vitesse du Pokémon
     * @var int
     */
    protected $speed;

    /**
     * Contruct de la classe Pokémon
     * @param string $name
     * @param string $element
     * @param int $hp
     */
    public function __construct(string $name, string $element, int $hp, int $speed, int $damage, string $type, float $damageTaux, string $secondaryEffect)
    {
        parent::__construct($damage, $type, $damageTaux, $secondaryEffect);
        $this->name = $name;
        $this->element = $element;
        $this->hp = $hp;
        $this->speed = $speed;
    }


    // GETTER
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

	/**
	 * Vitesse du Pokémon
	 * @return int
	 */
	public function getSpeed() {
		return $this->speed;
	}


    // SETTER
    /**
     * @param string $name
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $element
     * @return self
     */
    public function setElement($element): self
    {
        $this->element = $element;
        return $this;
    }

    /**
     * @param int $hp
     * @return self
     */
    public function setHp($hp): self
    {
        $this->hp = $hp;
        return $this;
    }
	
	/**
	 * Vitesse du Pokémon
	 * @param int $speed Vitesse du Pokémon
	 * @return self
	 */
	public function setSpeed($speed): self {
		$this->speed = $speed;
		return $this;
	}
}
?>