<?php
 
namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyWoundsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyWoundsRepository::class)
 */
class ProphecyWounds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound")
     * @ORM\JoinColumn(nullable=false)
     */
    private $wound;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $minsum;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $maxsum;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $wounds;

    /**
     * @return mixed
     */
    public function getMinsum(): ?int
    {
        return $this->minsum;
    }

    /**
     * @param mixed $minsum
     */
    public function setMinsum($minsum): self
    {
        $this->minsum = $minsum;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWounds(): ?int
    {
        return $this->wounds;
    }

    /**
     * @param mixed $wounds
     */
    public function setWounds($wounds): self
    {
        $this->wounds = $wounds;
        
        return $this;
    }

    /**
     * 
     */
    public function getWound(): ?ProphecyWound
    {
        return $this->wound;
        
        return $this;
    }

    /**
     * @return \App\Entity\Game\Campaign
     */
    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxsum(): ?int
    {
        return $this->maxsum;
        
        return $this;
    }

    /**
     * 
     */
    public function setWound($wound): self
    {
        $this->wound = $wound;
        
        return $this;
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
     * @param mixed $maxsum
     */
    public function setMaxsum(int $maxsum): self
    {
        $this->maxsum = $maxsum;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function __toString()
    {
        return $this->getWound()->getName();
    }
    
}
