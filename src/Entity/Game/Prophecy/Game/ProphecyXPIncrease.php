<?php

namespace App\Entity\Game\Prophecy\Game;

use App\Repository\Game\Prophecy\Game\XPIncreaseRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;

/**
 * @ORM\Entity(repositoryClass=XPIncreaseRepository::class)
 */
class ProphecyXPIncrease
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @ORM\Column(type="integer")
     */
    private $caracteristic;

    /**
     * @ORM\Column(type="integer")
     */
    private $majorAttribute;

    /**
     * @ORM\Column(type="integer")
     */
    private $minorAttribute;

    /**
     * @ORM\Column(type="integer")
     */
    private $reservedSkill;

    /**
     * @ORM\Column(type="integer")
     */
    private $skill;

    /**
     * @ORM\Column(type="integer")
     */
    private $forbiddenSkill;

    /**
     * @ORM\Column(type="integer")
     */
    private $mana;

    /**
     * @ORM\Column(type="integer")
     */
    private $spell;

    /**
     * @ORM\Column(type="integer")
     */
    private $famous;

    /**
     * @ORM\Column(type="integer")
     */
    private $favour;

    /**
     * @ORM\Column(type="integer")
     */
    private $advantage;

    /**
     * @ORM\Column(type="integer")
     */
    private $disadvantage;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCaracteristic(): ?int
    {
        return $this->caracteristic;
    }

    public function setCaracteristic(int $caracteristic): self
    {
        $this->caracteristic = $caracteristic;

        return $this;
    }

    public function getMajorAttribute(): ?int
    {
        return $this->majorAttribute;
    }

    public function setMajorAttribute(int $majorAttribute): self
    {
        $this->majorAttribute = $majorAttribute;

        return $this;
    }

    public function getMinorAttribute(): ?int
    {
        return $this->minorAttribute;
    }

    public function setMinorAttribute(int $minorAttribute): self
    {
        $this->minorAttribute = $minorAttribute;

        return $this;
    }

    public function getReservedSkill(): ?int
    {
        return $this->reservedSkill;
    }

    public function setReservedSkill(int $reservedSkill): self
    {
        $this->reservedSkill = $reservedSkill;

        return $this;
    }

    public function getSkill(): ?int
    {
        return $this->skill;
    }

    public function setSkill(int $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function getForbiddenSkill(): ?int
    {
        return $this->forbiddenSkill;
    }

    public function setForbiddenSkill(int $forbiddenSkill): self
    {
        $this->forbiddenSkill = $forbiddenSkill;

        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): self
    {
        $this->mana = $mana;

        return $this;
    }

    public function getSpell(): ?int
    {
        return $this->spell;
    }

    public function setSpell(int $spell): self
    {
        $this->spell = $spell;

        return $this;
    }

    public function getFamous(): ?int
    {
        return $this->famous;
    }

    public function setFamous(int $famous): self
    {
        $this->famous = $famous;

        return $this;
    }

    public function getFavour(): ?int
    {
        return $this->favour;
    }
 
    public function setFavour(int $favour): self
    {
        $this->favour = $favour;

        return $this;
    }

    public function getAdvantage(): ?int
    {
        return $this->advantage;
    }

    public function setAdvantage(int $advantage): self
    {
        $this->advantage = $advantage;

        return $this;
    }

    public function getDisadvantage(): ?int
    {
        return $this->disadvantage;
    }

    public function setDisadvantage(int $disadvantage): self
    {
        $this->disadvantage = $disadvantage;

        return $this;
    }
}
