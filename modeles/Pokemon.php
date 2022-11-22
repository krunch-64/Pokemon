<?php

class Pokemon
{
	/**
	 * Identifiant du Pokémon
	 * @var int
	 */
	protected $id;

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
     * dégât subit par le personnage
     * @var int
     */
    protected $damagesSuffered;

	/**
	 * faiblesse
	 * @var array
	 */
	protected $double_damage_from;

	/**
	 * faiblesse
	 * @var array
	 */
	protected $double_damage_to;

    /**
     * Contruct de la classe Pokémon
	 * @param int $id
     * @param string $name
     * @param string $element
     * @param string $element2
     * @param int $hp
     */
    public function __construct(string $name, string $element, string $element2, int $hp, int $damage, int $defense, array $double_damage_from, array $double_damage_to)
    {
        $this->name = $name;
        $this->element = $element;
        $this->element2 = $element2;
        $this->hp = $hp;
        $this->damage = $damage;
        $this->defense = $defense;
		$this->double_damage_from = $double_damage_from;
		$this->double_damage_to = $double_damage_to;
    }

	 /**
     * degat subit par le pokemon
     * @param int $degat
     * @return self
     */
    public function attacked($degat): self
    {   
		// si le damage_from correspond au type d'attaque de l'ennemie alors double degat

        if($this->getDefense() > 0)
        {
            $this->setDefense($this->getDefense() - 10);
            $this->setDamagesSuffered($degat - $this->getDefense());
        }
        else
        {
            $this->setDamagesSuffered($degat);
        }

        if($this->getDamagesSuffered() < 0)
        {
            $this->setDamagesSuffered(0);
        }

        $this->setHp($this->getHp()-$this->getDamagesSuffered());

        if($this->getHp() < 0)
        {
            $this->setHp(0);
        }

        return $this;
    }

	/**
     * degat fait par le pokemon
     * @return int
     */
    public function attack(): int
    {
		// si le damage_f correspond au type d'attaque de l'ennemie alors double degat

        return $this->getDamage();
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

	/**
	 * dégât subit par le personnage
	 * @return int
	 */
	public function getDamagesSuffered() {
		return $this->damagesSuffered;
	}
	
	/**
	 * dégât subit par le personnage
	 * @param int $damagesSuffered dégât subit par le personnage
	 * @return self
	 */
	public function setDamagesSuffered($damagesSuffered): self {
		$this->damagesSuffered = $damagesSuffered;
		return $this;
	}


	/**
	 * faiblesse
	 * @return array
	 */
	public function getDouble_damage_from() {
		return $this->double_damage_from;
	}
	
	/**
	 * faiblesse
	 * @param array $double_damage_from faiblesse
	 * @return self
	 */
	public function setDouble_damage_from($double_damage_from): self {
		$this->double_damage_from = $double_damage_from;
		return $this;
	}

	/**
	 * faiblesse
	 * @return array
	 */
	public function getDouble_damage_to() {
		return $this->double_damage_to;
	}
	
	/**
	 * faiblesse
	 * @param array $double_damage_to faiblesse
	 * @return self
	 */
	public function setDouble_damage_to($double_damage_to): self {
		$this->double_damage_to = $double_damage_to;
		return $this;
	}
}