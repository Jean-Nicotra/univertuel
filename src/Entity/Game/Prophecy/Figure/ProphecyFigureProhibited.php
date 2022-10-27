<?php

namespace App\Entity\Game\Prophecy\Figure;
 
use App\Repository\Game\Prophecy\Figure\ProphecyFigureProhibitedRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureProhibitedRepository::class)
 */
class ProphecyFigureProhibited
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="prohibiteds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prohibited;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    public function setFigure(ProphecyFigure $figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getProhibited(): ?ProphecyProhibited
    {
        return $this->prohibited;
    }

    public function setProhibited(ProphecyProhibited $prohibited): self
    {
        $this->prohibited = $prohibited;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
    
    
}
