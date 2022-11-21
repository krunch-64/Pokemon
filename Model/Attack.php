<?php

class Attack
{
    /**
     * Dégât de l'attaque
     * @var int
     */
    protected $damage;

    /**
     * Types d'attaque
     * @var string
     */
    protected $type;

    /**
     * Taux de dégât de l'attaque
     * @var float
     */
    protected $damageTaux;

    /**
     * Effect secondaire
     * @var string
     */
    protected $secondaryEffect;

    /**
     * Construct de la classe Attack
     * @param int $damage
     * @param string $type
     * @param float $damageTaux
     * @param string $secondaryEffect
     */
    public function __construct(int $damage, string $type, float $damageTaux, string $secondaryEffect)
    {
        $this->damage = $damage;
        $this->type = $type;
        $this->damageTaux = $damageTaux;
        $this->secondaryEffect = $secondaryEffect;
    }
    

    //GETTER
	/**
	 * Dégât de l'attaque
	 * @return int
	 */
	public function getDamage(): int 
    {
		return $this->damage;
	}

	/**
	 * Types d'attaque
	 * @return string
	 */
	public function getType(): string 
    {
		return $this->type;
	}

	/**
	 * Taux de dégât de l'attaque
	 * @return float
	 */
	public function getDamageTaux():float
    {
		return $this->damageTaux;
	}

	/**
	 * Effect secondaire
	 * @return string
	 */
	public function getSecondaryEffect(): string 
    {
		return $this->secondaryEffect;
	}

    //SETTER
	/**
	 * Dégât de l'attaque
	 * @param int $damage
	 * @return self
	 */
	public function setDamage($damage): self 
    {
		$this->damage = $damage;
		return $this;
	}

	/**
	 * Types d'attaque
	 * @param string $type
	 * @return self
	 */
	public function setType($type): self 
    {
		$this->type = $type;
		return $this;
	}

	/**
	 * Taux de dégât de l'attaque
	 * @param float $damageTaux
	 * @return self
	 */
	public function setDamageTaux($damageTaux): self
    {
		$this->damageTaux = $damageTaux;
		return $this;
	}

	/**
	 * Effect secondaire
	 * @param string $secondary
	 * @return self
	 */
	public function setSecondaryEffect($secondaryEffect): self 
    {
		$this->secondaryEffect = $secondaryEffect;
		return $this;
	}
}
?>