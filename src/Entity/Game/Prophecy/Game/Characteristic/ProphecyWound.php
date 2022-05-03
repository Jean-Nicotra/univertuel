<?php

namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyWoundRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyWoundRepository::class)
 */
class ProphecyWound
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
     * @ORM\Column(type="string", length=255)
     */
    private $damages;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxWounds;

    /**
     * @ORM\Column(type="integer")
     */
    private $malus;
     
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

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

    public function getDamages(): ?string
    {
        return $this->damages;
    }

    public function setDamages(string $damages): self
    {
        $this->damages = $damages;

        return $this;
    }

    public function getMaxWounds(): ?int
    {
        return $this->maxWounds;
    }

    public function setMaxWounds(int $maxWounds): self
    {
        $this->maxWounds = $maxWounds;

        return $this;
    }

    public function getMalus(): ?int
    {
        return $this->malus;
    }

    public function setMalus(int $malus): self
    {
        $this->malus = $malus;

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
