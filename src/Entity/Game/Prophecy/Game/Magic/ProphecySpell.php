<?php

namespace App\Entity\Game\Prophecy\Game\Magic;

use App\Repository\Game\Prophecy\Game\Magic\ProphecySpellRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecySpellRepository::class)
 */
class ProphecySpell
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

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $complexity;

    /**
     * @ORM\Column(type="integer")
     */
    private $manaCost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $castingTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $difficulty;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Magic\ProphecySphere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sphere;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline")
     * @ORM\JoinColumn(nullable=false)
     */
    private $discipline;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spellKeys;

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

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign($campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getComplexity(): ?int
    {
        return $this->complexity;
    }

    public function setComplexity(int $complexity): self
    {
        $this->complexity = $complexity;

        return $this;
    }

    public function getManaCost(): ?int
    {
        return $this->manaCost;
    }

    public function setManaCost(int $manaCost): self
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    public function getCastingTime(): ?string
    {
        return $this->castingTime;
    }

    public function setCastingTime(string $castingTime): self
    {
        $this->castingTime = $castingTime;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getSphere(): ?ProphecySphere
    {
        return $this->sphere;
    }

    public function setSphere($sphere): self
    {
        $this->sphere = $sphere;

        return $this;
    }

    public function getDiscipline(): ?ProphecyDiscipline
    {
        return $this->discipline;
    }

    public function setDiscipline($discipline): self
    {
        $this->discipline = $discipline;

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

    public function getSpellKeys(): ?string
    {
        return $this->spellKeys;
    }

    public function setSpellKeys(string $spellKeys): self
    {
        $this->spellKeys = $spellKeys;

        return $this;
    }
}
