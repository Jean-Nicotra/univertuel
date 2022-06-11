<?php

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureSphereRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySphere;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureSphereRepository::class)
 */
class ProphecyFigureSphere
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Magic\ProphecySphere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sphere;

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

    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    public function setFigure(ProphecyFigure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getSphere(): ?ProphecySphere
    {
        return $this->sphere;
    }

    public function setSphere(ProphecySphere $sphere): self
    {
        $this->sphere = $sphere;

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

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): self
    {
        $this->mana = $mana;

        return $this;
    }

    public function getCurrentMana(): ?int
    {
        return $this->currentMana;
    }

    public function setCurrentMana(?int $currentMana): self
    {
        $this->currentMana = $currentMana;

        return $this;
    }
}
