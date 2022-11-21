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
     * @var int
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
     * @param int $damageTaux
     * @param string $secondaryEffect
     */
    public function __construct(int $damage, string $type, int $damageTaux, string $secondaryEffect)
    {
        $this->damage = $damage;
        $this->type = $type;
        $this->damageTaux = $damageTaux;
        $this->secondaryEffect = $secondaryEffect;
    }
    
	/**
	 * Dégât de l'attaque
	 * @return int
	 */
	public function getDamage() {
		return $this->damage;
	}

	/**
	 * Dégât de l'attaque
	 * @param int $damage Dégât de l'attaque
	 * @return self
	 */
	public function setDamage($damage): self {
		$this->damage = $damage;
		return $this;
	}
}
?>