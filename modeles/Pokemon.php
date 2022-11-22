<?php

class Pokemon
{
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
     * Second élèment du Pokémon
     * @var string
     */
    protected $element2;

    /**
     * PV du Pokémon
     * @var int
     */
    protected $hp;

    /**
     * Attaque du Pokémon
     * @var int
     */
    protected $damage;

    /**
     * Défence du Pokémon
     * @var int
     */
    protected $defense;

    /**
     * Contruct de la classe Pokémon
     * @param string $name
     * @param string $element
     * @param string $element2
     * @param int $hp
     */
    public function __construct(string $name, string $element, string $element2, int $hp, int $damage, int $defense)
    {
        $this->name = $name;
        $this->element = $element;
        $this->element2 = $element2;
        $this->hp = $hp;
        $this->damage = $damage;
        $this->defense = $defense;
    }

	// GETTER ET SETTER
	/**
	 * Nom du Pokémon
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Nom du Pokémon
	 * @param string $name Nom du Pokémon
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * Élèment du Pokémon
	 * @return string
	 */
	public function getElement() {
		return $this->element;
	}
	
	/**
	 * Élèment du Pokémon
	 * @param string $element Élèment du Pokémon
	 * @return self
	 */
	public function setElement($element): self {
		$this->element = $element;
		return $this;
	}

	/**
	 * Second élèment du Pokémon
	 * @return string
	 */
	public function getElement2() {
		return $this->element2;
	}
	
	/**
	 * Second élèment du Pokémon
	 * @param string $element2 Second élèment du Pokémon
	 * @return self
	 */
	public function setElement2($element2): self {
		$this->element2 = $element2;
		return $this;
	}

	/**
	 * PV du Pokémon
	 * @return int
	 */
	public function getHp() {
		return $this->hp;
	}
	
	/**
	 * PV du Pokémon
	 * @param int $hp PV du Pokémon
	 * @return self
	 */
	public function setHp($hp): self {
		$this->hp = $hp;
		return $this;
	}

	/**
	 * Attaque du Pokémon
	 * @return int
	 */
	public function getDamage() {
		return $this->damage;
	}
	
	/**
	 * Attaque du Pokémon
	 * @param int $damage Attaque du Pokémon
	 * @return self
	 */
	public function setDamage($damage): self {
		$this->damage = $damage;
		return $this;
	}

	/**
	 * Défence du Pokémon
	 * @return int
	 */
	public function getDefense() {
		return $this->defense;
	}
	
	/**
	 * Défence du Pokémon
	 * @param int $defense Défence du Pokémon
	 * @return self
	 */
	public function setDefense($defense): self {
		$this->defense = $defense;
		return $this;
	}
}