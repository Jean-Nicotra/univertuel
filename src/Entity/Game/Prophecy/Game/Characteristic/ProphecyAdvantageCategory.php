<?php
 
namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyAdvantageCategoryRepository::class)
 */
class ProphecyAdvantageCategory
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function __toString()
    {
        return ucfirst($this->name);
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
    
    public function getCampaign (): ?Campaign
    {
        return $this->campaign;
    }
    
    public function setCampaign ($campaign): self
    {
        $this->campaign = $campaign;
        
        return $this;
    }
}
