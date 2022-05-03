<?php

namespace App\Entity\Game\Prophecy\Game\Item;

use App\Repository\Game\Prophecy\Game\Item\ProphecyArmorRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyArmorRepository::class)
 */
class ProphecyArmor
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $weight;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $createDifficulty;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $constructionTime;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villageRarety;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityRarety;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $villagePrice;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $cityPrice;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $protection;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $movePenalty;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $material;
    
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
     * @return \App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory
     */
    public function getCategory(): ?ProphecyArmorCategory
    {
        return $this->category;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Item\ProphecyArmorCategory $category
     */
    public function setCategory(ProphecyArmorCategory $category): self
    {
        $this->category = $category;
        
        return $this;
    }

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
    
    public function getWeight(): ?int
    {
        return $this->weight;
    }
    
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;
        
        return $this;
    }
    
    public function getCreateDifficulty(): ?int
    {
        return $this->createDifficulty;
    }
    
    public function setCreateDifficulty(int $createDifficulty): self
    {
        $this->createDifficulty = $createDifficulty;
        
        return $this;
    }
    
    public function getConstructionTime(): ?int
    {
        return $this->constructionTime;
    }
    
    public function setConstructionTime(int $constructionTime): self
    {
        $this->constructionTime = $constructionTime;
        
        return $this;
    }
    
    public function getVillageRarety(): ?string
    {
        return $this->villageRarety;
    }
    
    public function setVillageRarety(string $villageRarety): self
    {
        $this->villageRarety = $villageRarety;
        
        return $this;
    }
    
    public function getCityRarety(): ?string
    {
        return $this->cityRarety;
    }
    
    public function setCityRarety(string $cityRarety): self
    {
        $this->cityRarety = $cityRarety;
        
        return $this;
    }
    
    public function getVillagePrice(): ?int
    {
        return $this->villagePrice;
    }
    
    public function setVillagePrice(int $villagePrice): self
    {
        $this->villagePrice = $villagePrice;
        
        return $this;
    }
    
    public function getCityPrice(): ?int
    {
        return $this->cityPrice;
    }
    
    public function setCityPrice(int $cityPrice): self
    {
        $this->cityPrice = $cityPrice;
        
        return $this;
    }
    
    public function getProtection(): ?int
    {
        return $this->protection;
    }
     
    public function setProtection(int $protection): self
    {
        $this->protection = $protection;
        
        return $this;
    }
    
    public function getMovePenalty(): ?int
    {
        return $this->movePenalty;
    }
    
    public function setMovePenalty(int $movePenalty): self
    {
        $this->movePenalty = $movePenalty;
        
        return $this;
    }
    
    public function getMaterial(): ?string
    {
        return $this->material;
    }
    
    public function setMaterial(string $material): self
    {
        $this->material = $material;
        
        return $this;
    }
}
