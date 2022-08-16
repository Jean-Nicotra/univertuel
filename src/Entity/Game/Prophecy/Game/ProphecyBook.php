<?php

namespace App\Entity\Game\Prophecy\Game;
 
use App\Repository\Game\Prophecy\Game\ProphecyBookRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Game;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyBookRepository::class)
 */
class ProphecyBook
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * game which is link to. 
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Game")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @return \App\Entity\Game\Game
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param \App\Entity\Game\Game $game
     */
    public function setGame(Game $game)
    {
        $this->game = $game;
        
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
