<?php

namespace App\Entity\Game\Prophecy\Game;

use App\Repository\Game\Prophecy\Game\ProphecyStartMajorAttributeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;

/**
 * @ORM\Entity(repositoryClass=StartMajorAttributeRepository::class)
 */
class ProphecyStartMajorAttribute
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
     * @ORM\JoinColumn(nullable=false)
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $value1;

    /**
     * @ORM\Column(type="integer")
     */
    private $value2;

    /**
     * @ORM\Column(type="integer")
     */
    private $value3;

    /**
     * @ORM\Column(type="integer")
     */
    private $value4;

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

    public function getValue1(): ?int
    {
        return $this->value1;
    }

    public function setValue1(int $value1): self
    {
        $this->value1 = $value1;

        return $this;
    }

    public function getValue2(): ?int
    {
        return $this->value2;
    }

    public function setValue2(int $value2): self
    {
        $this->value2 = $value2;

        return $this;
    }

    public function getValue3(): ?int
    {
        return $this->value3;
    }

    public function setValue3(int $value3): self
    {
        $this->value3 = $value3;

        return $this;
    }

    public function getValue4(): ?int
    {
        return $this->value4;
    }

    public function setValue4(int $value4): self
    {
        $this->value4 = $value4;

        return $this;
    }
}
