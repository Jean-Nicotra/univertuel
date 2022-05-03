<?php

namespace App\Entity\Game\Prophecy\Game\World;

use App\Repository\Game\Prophecy\Game\World\ProphecyCurrencyRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyCurrencyRepository::class)
 */
class ProphecyCurrency
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
    private $factorValue;

    /**
     * @ORM\Column(type="boolean")
     */
    private $available;

    /**
     * @ORM\Column(type="boolean")
     */
    private $display;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;
    
    /**
     * @ORM\Column(type="text") 
     */
    private $description;

    /**
     * @return mixed
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): self
    {
        $this->description = $description;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFactorValue(): ?int
    {
        return $this->factorValue;
    }

    public function setFactorValue(int $factorValue): self
    {
        $this->factorValue = $factorValue;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }
 
    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getDisplay(): ?bool
    {
        return $this->display;
    }

    public function setDisplay(bool $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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
