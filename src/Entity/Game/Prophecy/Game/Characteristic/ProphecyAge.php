<?php 

namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyAgeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyAgeRepository::class)
 */
class ProphecyAge
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
    private $startAttValue1;

    /**
     * @ORM\Column(type="integer")
     */
    private $startAttValue2;

    /**
     * @ORM\Column(type="integer")
     */
    private $startAttValue3;

    /**
     * @ORM\Column(type="integer")
     */
    private $startAttValue4;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @return mixed
     */
    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    /**
     * @param mixed $campaign
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

    public function getStartAttValue1(): ?int
    {
        return $this->startAttValue1;
    }

    public function setStartAttValue1(int $startAttValue1): self
    {
        $this->startAttValue1 = $startAttValue1;

        return $this;
    }

    public function getStartAttValue2(): ?int
    {
        return $this->startAttValue2;
    }

    public function setStartAttValue2(int $startAttValue2): self
    {
        $this->startAttValue2 = $startAttValue2;

        return $this;
    }

    public function getStartAttValue3(): ?int
    {
        return $this->startAttValue3;
    }

    public function setStartAttValue3(int $startAttValue3): self
    {
        $this->startAttValue3 = $startAttValue3;

        return $this;
    }

    public function getStartAttValue4(): ?int
    {
        return $this->startAttValue4;
    }

    public function setStartAttValue4(int $startAttValue4): self
    {
        $this->startAttValue4 = $startAttValue4;

        return $this;
    }
}
