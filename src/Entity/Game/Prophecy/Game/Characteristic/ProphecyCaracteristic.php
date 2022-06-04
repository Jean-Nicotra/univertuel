<?php 

namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyCaracteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=ProphecyCaracteristicRepository::class)
 */
class ProphecyCaracteristic
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
     * @ORM\Column(type="string", length=3)
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $minValue;

    /**
     * @ORM\Column(type="integer")
     */
    private $maximumValue;

    /**
     * @ORM\Column(type="integer")
     */
    private $xpIncrease;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;
    
    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function __toString()
    {
        return (string) $this->name;
    }
    

    
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return ucfirst($this->name);
    }

    public function setName(string $name): self
    {
        $this->name = strtolower($name);

        return $this;
    }

    public function getCode(): ?string
    {
        return strtoupper($this->code);
    }

    public function setCode(string $code): self
    {
        $this->code = strtolower($code);

        return $this;
    }

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function setMinValue(int $minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }

    public function getMaximumValue(): ?int
    {
        return $this->maximumValue;
    }

    public function setMaximumValue(int $maximumValue): self
    {
        $this->maximumValue = $maximumValue;

        return $this;
    }

    public function getXpIncrease(): ?int
    {
        return $this->xpIncrease;
    }

    public function setXpIncrease(int $xpIncrease): self
    {
        $this->xpIncrease = $xpIncrease;

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
