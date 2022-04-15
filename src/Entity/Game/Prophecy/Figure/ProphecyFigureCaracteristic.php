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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic")
     * @ORM\JoinColumn(nullable=false)
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

    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    public function setFigure(ProphecyFigure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getCaracteristic(): ?ProphecyCaracteristic
    {
        return $this->caracteristic;
    }

    public function setCaracteristic(ProphecyCaracteristic $caracteristic): self
    {
        $this->caracteristic = $caracteristic;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
