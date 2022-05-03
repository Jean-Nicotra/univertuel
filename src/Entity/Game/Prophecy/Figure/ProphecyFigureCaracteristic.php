<?php

/*******************************************************************************************************************
 name      : ProphecyFigureCatacteristic.php
 Role      : Entity describe relation between a figure and caracteristics in Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureCaracteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyFigureCaracteristicRepository::class)
 */
class ProphecyFigureCaracteristic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="caracteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic")
     * @ORM\JoinColumn(nullable=true)
     */
    private $caracteristic;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFigure()//: ?ProphecyFigure
    {
        return $this->figure;
    }

    public function setFigure($figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getCaracteristic()//: ?ProphecyCaracteristic
    {
        return $this->caracteristic;
    }

    public function setCaracteristic($caracteristic): self
    {
        $this->caracteristic = $caracteristic;

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
    
    public function __toString(): ?string
    {
        return $this->getCaracteristic()->getName();
    }
    
}
