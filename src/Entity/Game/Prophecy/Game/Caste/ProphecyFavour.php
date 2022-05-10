<?php

namespace App\Entity\Game\Prophecy\Game\Caste;

use App\Repository\Game\Prophecy\Game\Caste\ProphecyFavourRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;
 
/**
 * @ORM\Entity(repositoryClass=prophecyFavourRepository::class)
 */
class ProphecyFavour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste")
     * @ORM\JoinColumn(nullable=false)
     */
    private $caste;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

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

    public function getCaste(): ?ProphecyCaste
    {
        return $this->caste;
    }

    public function setCaste(ProphecyCaste $caste): self
    {
        $this->caste = $caste;

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
