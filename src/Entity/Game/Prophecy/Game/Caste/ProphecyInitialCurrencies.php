<?php

namespace App\Entity\Game\Prophecy\Game\Caste;
 
use App\Repository\Game\Prophecy\Game\Caste\ProphecyInitialCurrenciesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\World\ProphecyCurrency;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyInitialCurrenciesRepository::class)
 */
class ProphecyInitialCurrencies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste")
     * @ORM\JoinColumn(nullable=false)
     */
    private $caste;

    /**
     * @ORM\Column(type="integer")
     */
    private $dices;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\World\ProphecyCurrency")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currency;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;


    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
        
        return $this;
    }


    public function setCampaign($campaign): self
    {
        $this->campaign = $campaign;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCaste(): ?ProphecyCaste
    {
        return $this->caste;
    }

    public function setCaste(ProphecyCaste $caste): self
    {
        $this->caste = $caste;

        return $this;
    }

    public function getDices(): ?int
    {
        return $this->dices;
    }

    public function setDices(int $dices): self
    {
        $this->dices = $dices;

        return $this;
    }

    public function getCurrency(): ?ProphecyCurrency
    {
        return $this->currency;
    }

    public function setCurrency(ProphecyCurrency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
