<?php

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureSpellRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureSpellRepository::class)
 */
class ProphecyFigureSpell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="spells")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Magic\ProphecySpell")
     * @ORM\JoinColumn(nullable=false)
     */
    private $spell;

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

    public function getSpell(): ?ProphecySpell
    {
        return $this->spell;
    }

    public function setSpell(ProphecySpell $spell): self
    {
        $this->spell = $spell;

        return $this;
    }
    
    public function __toString()
    {
        return $this->spell->getName();
    }
}
