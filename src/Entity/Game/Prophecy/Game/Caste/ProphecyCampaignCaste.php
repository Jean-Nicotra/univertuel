<?php

namespace App\Entity\Game\Prophecy\Game\Caste;

use App\Repository\Game\Prophecy\Game\Caste\ProphecyCampaignCasteRepository;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyCampaignCasteRepository::class)
 */
class ProphecyCampaignCaste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $creationAvailable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $display;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationAvailable(): ?bool
    {
        return $this->creationAvailable;
    }

    public function setCreationAvailable(bool $creationAvailable): self
    {
        $this->creationAvailable = $creationAvailable;

        return $this;
    }

    public function getDisplay(): ?bool
    {
        return $this->display;
    }

    public function setDisplay(bool $display): self
    {
        $this->display = $display;

        return $this;
    }
}
