<?php

namespace App\Entity\Game\Prophecy\Game;

use App\Repository\Game\Prophecy\Game\StartCaracteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Campaign\Campaign;
  
/** 
 * @ORM\Entity(repositoryClass=StartCaracteristicRepository::class)
 */
class ProphecyStartCaracteristic
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
    private $value1;

    /**
     * @ORM\Column(type="string", length=255)
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

    /**
     * @ORM\Column(type="integer")
     */
    private $value5;

    /**
     * @ORM\Column(type="integer")
     */
    private $value6;

    /**
     * @ORM\Column(type="integer")
     */
    private $value7;

    /**
     * @ORM\Column(type="integer")
     */
    private $value8;

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

    public function getValue5(): ?int
    {
        return $this->value5;
    }

    public function setValue5(int $value5): self
    {
        $this->value5 = $value5;

        return $this;
    }

    public function getValue6(): ?int
    {
        return $this->value6;
    }

    public function setValue6(int $value6): self
    {
        $this->value6 = $value6;

        return $this; 
    }

    public function getValue7(): ?int
    {
        return $this->value7;
    }

    public function setValue7(int $value7): self
    {
        $this->value7 = $value7;

        return $this;
    }

    public function getValue8(): ?int
    {
        return $this->value8;
    }

    public function setValue8(int $value8): self
    {
        $this->value8 = $value8;

        return $this;
    }
}
