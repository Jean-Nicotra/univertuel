<?php

namespace App\Entity\Game\Log;

use App\Repository\Game\Log\LogRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $figure;

    /**
     * @ORM\Column(type="integer")
     */
    private $campaign;

    /**
     * @ORM\Column(type="integer")
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

    public function getFigure(): ?int
    {
        return $this->figure;
    }

    public function setFigure(int $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getCampaign(): ?int
    {
        return $this->campaign;
    }

    public function setCampaign(int $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
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
