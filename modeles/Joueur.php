<?php

trait Joueur
{
    /**
     * Nom du jouer 
     * @var string
     */
    protected $nameJoueur = "bruno";

    /**
     * Construct de la class Joueur
     * @param string $nameJoueur
     */
    public function __construct(string $nameJoueur)
    {
        $this->nameJoueur = $nameJoueur;
    }

    // GETTER
    /**
     * @return string
     */
    public function getNameJoueur(): string
    {
        return $this->nameJoueur;
    }

    //SETTER
    /**
     * @param string $nameJoueur
     * @return self
     */
    public function setNameJoueur($nameJoueur): self
    {
        $this->nameJoueur = $nameJoueur;
        return $this;
    }
}
?>