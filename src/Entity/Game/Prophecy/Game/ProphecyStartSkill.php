<?php

namespace App\Entity\Game\Prophecy\Game;

use App\Repository\Game\Prophecy\Game\ProphecyStartSkillRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;

/**
 * @ORM\Entity(repositoryClass=ProphecyStartSkillRepository::class)
 */
class ProphecyStartSkill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge")
     * @ORM\JoinColumn(nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;
    

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

    public function getAge(): ?ProphecyAge
    {
        return $this->age;
    }

    public function setAge(ProphecyAge $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
