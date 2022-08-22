<?php

namespace App\Entity\Game\Prophecy\Game\Characteristic;
  
use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyTendencyAgeNationRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\World\ProphecyNation;

/**
 * @ORM\Entity(repositoryClass=ProphecyTendencyAgeRepository::class)
 */
class ProphecyTendencyAgeNation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\World\ProphecyNation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $tendency;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNation(): ?ProphecyNation
    {
        return $this->nation;
    }

    public function setNation(int $nation): self
    {
        $this->nation = $nation;

        return $this;
    }

    public function getAge(): ?ProphecyAge
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getTendency(): ?int
    {
        return $this->tendency;
    }

    public function setTendency(int $tendency): self
    {
        $this->tendency = $tendency;

        return $this;
    }
}
