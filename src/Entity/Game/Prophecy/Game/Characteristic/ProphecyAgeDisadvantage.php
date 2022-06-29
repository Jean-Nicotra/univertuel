<?php

namespace App\Entity\Game\Prophecy\Game\Characteristic;
 
use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyAgeDisadvantageRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyAgeDisadvantageRepository::class)
 */
class ProphecyAgeDisadvantage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge")
     * @ORM\JoinColumn(nullable=true)
     */
    private $age;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isOptional;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @return \App\Entity\Game\Campaign
     */
    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    /**
     * @param \App\Entity\Game\Campaign $campaign
     */
    public function setCampaign($campaign): self
    {
        $this->campaign = $campaign;
        
        return $this;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge
     */
    public function getAge(): ?ProphecyAge
    {
        return $this->age;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge $age
     */
    public function setAge($age): self
    {
        $this->age = $age;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?ProphecyAdvantageCategory
    {
        return $this->category;
    }

    public function setCategory($category): self
    {
        $this->category = $category;

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

    public function getIsOptional(): ?bool
    {
        return $this->isOptional;
    }

    public function setIsOptional(bool $isOptional): self
    {
        $this->isOptional = $isOptional;

        return $this;
    }
}
