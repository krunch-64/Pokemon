<?php

require_once('./modeles/Joueur.php');

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
     * PV du Pokémon
     * @var int
     */
    protected $hp;

	/**
	 * PV max du Pokémon
	 * @var int
	 */
	protected $hpmax;

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
	 * img du pokemon de face
	 * @var string
	 */
	protected $img_front;

	/**
	 * img du pokemon de dos
	 * @var string
	 */
	protected $img_back;

    /**
     * Contruct de la classe Pokémon
	 * @param int $id
     * @param string $name
     * @param string $element
     * @param int $hp
	 * @param int $damage
	 * @param int $defense
	 * @param array $double_damage_from
	 * @param string $img_front
     */
    public function __construct(int $id, string $name, string $element, int $hp, int $damage, int $defense, array $double_damage_from, string $img_front, string $img_back)
    {
		$this->id = $id;
        $this->name = $name;
        $this->element = $element;
        $this->hp = $hp;
        $this->damage = $damage;
        $this->defense = $defense;
		$this->double_damage_from = $double_damage_from;
		$this->img_front = $img_front;
		$this->img_back = $img_back;
	}


	 /**
     * degat subit par le pokemon
     * @param int $degat
     * @return int
     */
    public function attacked($degat, $element): int
    {   
		// si le damage_from correspond au type d'attaque de l'ennemie alors double degat
		for($n=0; $n<count($this->getDouble_damage_from()); $n++)
        {
            if('"'.$element.'"' == json_encode($this->getDouble_damage_from()[$n]))
			{
				$degat = $degat * 2;
				break;
			}
        }

        if($this->getDefense() > 0)
        {
            $this->setDefense($this->getDefense() - ($this->getDefense()*0.10));
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

        if($this->getHp() <= 0)
        {
            $this->setHp(0);
        }

        return $this->getHp();
    }

	// /**
    //  * degat fait par le pokemon
    //  * @return int
    //  */
    // public function attack(): int
    // {
	// 	// si le damage_f correspond au type d'attaque de l'ennemie alors double degat

    //     return $this->getDamage();
    // }

	// /**
	//  * augmenter les pv quand il est sur le banc
	//  * @return self
	//  */
	// public function addpv(): self
	// {
	// 	$this->setHp($this->getHp()+($this->getHp()*0.10));
	// 	return $this;
	// }

	// GETTER ET SETTER
	/**
	 * Identifiant du Pokémon
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Identifiant du Pokémon
	 * @param int $id Identifiant du Pokémon
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

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
	 * PV max du Pokémon
	 * @return int
	 */
	public function getHpmax() {
		return $this->hpmax;
	}
	
	/**
	 * PV max du Pokémon
	 * @param int $hpmax PV max du Pokémon
	 * @return self
	 */
	public function setHpmax($hpmax): self {
		$this->hpmax = $hpmax;
		return $this;
	}

	/**
	 * img du pokemon de face
	 * @return string
	 */
	public function getImg_front() {
		return $this->img_front;
	}
	
	/**
	 * img du pokemon de face
	 * @param string $img_front img du pokemon de face
	 * @return self
	 */
	public function setImg_front($img_front): self {
		$this->img_front = $img_front;
		return $this;
	}

	/**
	 * img du pokemon de dos
	 * @return string
	 */
	public function getImg_back() {
		return $this->img_back;
	}
	
	/**
	 * img du pokemon de dos
	 * @param string $img_back img du pokemon de dos
	 * @return self
	 */
	public function setImg_back($img_back): self {
		$this->img_back = $img_back;
		return $this;
	}
}