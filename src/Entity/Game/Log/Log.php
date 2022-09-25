<?php

namespace App\Entity\Game\Log;

use App\Repository\Game\Log\LogRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Figure;
use App\Entity\Game\Campaign;

/**
 * @ORM\Entity(repositoryClass=LogRepository::class)
 */
class Log
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Figure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campaign;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Log\LogCategory")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFigure(): ?Figure
    {
        return $this->figure;
    }

    public function setFigure(Figure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign(Campaign $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getCategory(): ?LogCategory
    {
        return $this->category;
    }

    public function setCategory(LogCategory $category): self
    {
        $this->category = $category;

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
}
