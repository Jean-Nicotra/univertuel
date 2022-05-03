<?php

namespace App\Entity\Game\Prophecy\Game\Item;

use App\Repository\Game\Prophecy\Game\Item\ProphecyWeaponRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;

/** 
 * @ORM\Entity(repositoryClass=ProphecyWeaponRepository::class)
 */
class ProphecyWeapon
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
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $creationDifficulty;

    /**
     * @ORM\Column(type="integer")
     */
    private $constructionDelay;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic")
     * @ORM\JoinColumn(nullable=true)
     */
    private $caracRequirement1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $valueRequirement1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic")
     * @ORM\JoinColumn(nullable=true)
     */
    private $caracRequirement2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valueRequirement2;

    /**
     * @ORM\Column(type="integer")
     */
    private $meleeInitiative;

    /**
     * @ORM\Column(type="integer")
     */
    private $contactInitiative;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $special;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $damages;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

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

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getCreationDifficulty(): ?int
    {
        return $this->creationDifficulty;
    }

    public function setCreationDifficulty(int $creationDifficulty): self
    {
        $this->creationDifficulty = $creationDifficulty;

        return $this;
    }

    public function getConstructionDelay(): ?int
    {
        return $this->constructionDelay;
    }

    public function setConstructionDelay(int $constructionDelay): self
    {
        $this->constructionDelay = $constructionDelay;

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

    public function getCaracRequirement1(): ?ProphecyCaracteristic
    {
        return $this->caracRequirement1;
    }

    public function setCaracRequirement1($caracRequirement1): self
    {
        $this->caracRequirement1 = $caracRequirement1;

        return $this;
    }

    public function getValueRequirement1(): ?int
    {
        return $this->valueRequirement1;
    }

    public function setValueRequirement1(int $valueRequirement1): self
    {
        $this->valueRequirement1 = $valueRequirement1;

        return $this;
    }

    public function getCaracRequirement2(): ?ProphecyCaracteristic
    {
        return $this->caracRequirement2;
    }

    public function setCaracRequirement2($caracRequirement2): self
    {
        $this->caracRequirement2 = $caracRequirement2;

        return $this;
    }

    public function getValueRequirement2(): ?int
    {
        return $this->valueRequirement2;
    }

    public function setValueRequirement2(int $valueRequirement2): self
    {
        $this->valueRequirement2 = $valueRequirement2;

        return $this;
    }

    public function getMeleeInitiative(): ?int
    {
        return $this->meleeInitiative;
    }

    public function setMeleeInitiative(int $meleeInitiative): self
    {
        $this->meleeInitiative = $meleeInitiative;

        return $this;
    }

    public function getContactInitiative(): ?int
    {
        return $this->contactInitiative;
    }

    public function setContactInitiative(int $contactInitiative): self
    {
        $this->contactInitiative = $contactInitiative;

        return $this;
    }

    public function getSpecial(): ?string
    {
        return $this->special;
    }

    public function setSpecial(string $special): self
    {
        $this->special = $special;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
