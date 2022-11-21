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
     * PV du Pokémon
     * @var int
     */
    protected $hp;

    /**
     * Crontruct de la classe Pokémon
     * @param string $name
     * @param string $element
     * @param int $hp
     */
    public function __construct(string $name, string $element, int $hp)
    {
        $this->name = $name;
        $this->element = $element;
        $this->hp = $hp;
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

}
?>