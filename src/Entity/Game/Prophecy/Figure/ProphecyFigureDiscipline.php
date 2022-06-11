<?php

/*******************************************************************************************************************
 name      : ProphecyFigureDiscipline.php
 Role      : Entity describe relation between a figure and Discipline in Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureDisciplineRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyFigureDisciplineRepository::class)
 */
class ProphecyFigureDiscipline
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline")
     * @ORM\JoinColumn(nullable=false)
     */
    private $discipline;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $value;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mana;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $currentMana;
    

    public function __construct()
    {
        $this->setValue(0);
    }
    
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscipline(): ?ProphecyDiscipline
    {
        return $this->discipline;
    }

    public function setDiscipline(ProphecyDiscipline $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    public function setFigure(ProphecyFigure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana($mana): self
    {
        $this->mana = $mana;

        return $this;
    }

    public function getCurrentMana(): ?int
    {
        return $this->currentMana;
    }

    public function setCurrentMana($currentMana): self
    {
        $this->currentMana = $currentMana;

        return $this;
    }
}
