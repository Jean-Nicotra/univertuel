<?php

/*******************************************************************************************************************
 name      : ProphecyFigureMajorAttribute.php
 Role      : Entity describe relation between a figure and MajorAttribute in Prophecy game 
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureMajorAttributeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyFigureMajorAttributeRepository::class)
 */
class ProphecyFigureMajorAttribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="majorAttributes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    
    /**
     * a major attribute object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute")
     * @ORM\JoinColumn(nullable=false)
     */
    private $majorAttribute;

    /**
     * attribute value for figure
     * @ORM\Column(type="integer", nullable=true)
     */
    private $value;

    /**
     * 
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * 
     * @return ProphecyFigure|NULL
     */
    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    /**
     * 
     * @param ProphecyFigure $figure
     * @return self
     */
    public function setFigure(ProphecyFigure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getMajorAttribute(): ?ProphecyMajorAttribute
    {
        return $this->majorAttribute;
    }

    public function setMajorAttribute(ProphecyMajorAttribute $attribute): self
    {
        $this->majorAttribute = $attribute;

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
