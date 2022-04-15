<?php

namespace App\Entity\Game\Prophecy\Game\Caste;

use App\Repository\Game\Prophecy\Game\Caste\ProphecyCarrierRepository;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyCarrierRepository::class)
 */
class ProphecyCarrier
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
     * @ORM\Column(type="string", length=255)
     */
    private $caste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prohibited;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campaign;

    /**
     * @ORM\Column(type="integer")
     */
    private $minStatus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $technic;

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

    public function getCaste(): ?string
    {
        return $this->caste;
    }

    public function setCaste(string $caste): self
    {
        $this->caste = $caste;

        return $this;
    }

    public function getProhibited(): ?string
    {
        return $this->prohibited;
    }

    public function setProhibited(string $prohibited): self
    {
        $this->prohibited = $prohibited;

        return $this;
    }

    public function getCampaign(): ?string
    {
        return $this->campaign;
    }

    public function setCampaign(string $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getMinStatus(): ?int
    {
        return $this->minStatus;
    }

    public function setMinStatus(int $minStatus): self
    {
        $this->minStatus = $minStatus;

        return $this;
    }

    public function getTechnic(): ?string
    {
        return $this->technic;
    }

    public function setTechnic(string $technic): self
    {
        $this->technic = $technic;

        return $this;
    }
}
