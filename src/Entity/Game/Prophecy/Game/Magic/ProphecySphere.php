<?php

namespace App\Entity\Game\Prophecy\Game\Magic;

use App\Repository\Game\Prophecy\Game\Magic\ProphecySphereRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecySphereRepository::class)
 */
class ProphecySphere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $maximumValue;

    /**
     * @ORM\Column(type="integer")
     */
    private $minValue;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @ORM\Column(type="integer")
     */
    private $xpIncrease;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function __toString()
    {
        return (string) $this->name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMaximumValue(): ?int
    {
        return $this->maximumValue;
    }

    public function setMaximumValue(int $maximumValue): self
    {
        $this->maximumValue = $maximumValue;

        return $this;
    }

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function setMinValue(int $minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign($campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }
 
    public function getXpIncrease(): ?int
    {
        return $this->xpIncrease;
    }

    public function setXpIncrease(int $xpIncrease): self
    {
        $this->xpIncrease = $xpIncrease;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
