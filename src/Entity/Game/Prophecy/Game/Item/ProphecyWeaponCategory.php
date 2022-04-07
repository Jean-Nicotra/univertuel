<?php
 
namespace App\Entity\Game\Prophecy\Game\Item;

use App\Repository\Game\Prophecy\Game\Item\ProphecyWeaponCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyWeaponCategoryRepository::class)
 */
class ProphecyWeaponCategory
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \App\Entity\Campaign\Campaign
     */
    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    /**
     * @param \App\Entity\Campaign\Campaign $campaign
     */
    public function setCampaign($campaign): self 
    {
        $this->campaign = $campaign;
        
        return $this;
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
}
