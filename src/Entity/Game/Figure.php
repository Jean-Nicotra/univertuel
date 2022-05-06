<?php

namespace App\Entity\Game;

use App\Repository\Game\FigureRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User\User;
 
/**
 * @ORM\Entity(repositoryClass=FigureRepository::class)
 */
class Figure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="integer")
     *
     */
    private $figure;

    /**
     * campaign which hold the figure
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campaign;
    
    /**
     * figure's owner
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;
    
    /**
     *
     * @ORM\Column(type="string")
     *
     */
    private $name;

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): self
    {
        $this->name = $name;
        
        return $this;
    }

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

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign(Campaign $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }
    
    public function getOwner(): ?User
    {
        return $this->owner;
    }
    
    public function setOwner(User $user): self
    {
        $this->owner = $user;
        
        return $this;
    }
    
    
}
