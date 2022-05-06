<?php

namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyDisadvantageRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyDisadvantageRepository::class)
 */
class ProphecyDisadvantage
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $advantageCategory;

    /**
     * @ORM\Column(type="boolean")
     */
    private $multiselect;

    /**
     * @ORM\Column(type="boolean")
     */
    private $buyable;

    /**
     * @ORM\Column(type="integer")
     */
    private $initialCost;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return ucfirst($this->name);
    }

    public function setName(string $name): self
    {
        $this->name = strtolower($name);

        return $this;
    }

    public function getAdvantageCategory(): ?ProphecyAdvantageCategory
    {
        return $this->advantageCategory;
    }

    public function setAdvantageCategory(ProphecyAdvantageCategory $advantageCategory): self
    {
        $this->advantageCategory = $advantageCategory;

        return $this;
    }

    public function getMultiselect(): ?bool
    {
        return $this->multiselect;
    }

    public function setMultiselect(bool $multiselect): self
    {
        $this->multiselect = $multiselect;

        return $this;
    }

    public function getBuyable(): ?bool
    {
        return $this->buyable;
    }

    public function setBuyable(bool $buyable): self
    {
        $this->buyable = $buyable;

        return $this;
    }

    public function getInitialCost(): ?int
    {
        return $this->initialCost;
    }

    public function setInitialCost(int $initialCost): self
    {
        $this->initialCost = $initialCost;

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

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign($campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }
}
