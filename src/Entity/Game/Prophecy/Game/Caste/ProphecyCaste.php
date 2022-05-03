<?php

namespace App\Entity\Game\Prophecy\Game\Caste;

use App\Repository\Game\Prophecy\Game\Caste\ProphecyCasteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProphecyCasteRepository::class)
 */
class ProphecyCaste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    public function __construct()
    {
        $this->setCampaign(null);
    }
    
    public function __toString(): ?string
    {
        return (string) $this->name;
    }
    
    /**
     * @return \App\Entity\Campaign\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param \App\Entity\Campaign\Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

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
