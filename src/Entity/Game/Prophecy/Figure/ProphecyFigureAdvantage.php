<?php

namespace App\Entity\Game\Prophecy\Figure;
 
use App\Repository\Game\Prophecy\Figure\ProphecyFigureAdvantageRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureAdvantageRepository::class)
 */
class ProphecyFigureAdvantage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="advantages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * a major attribute object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $advantage;

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

    public function getAdvantage(): ?ProphecyAdvantage
    {
        return $this->advantage;
    }

    public function setAdvantage(ProphecyAdvantage $advantage): self
    {
        $this->advantage = $advantage;

        return $this;
    }
    
    public function __toString()
    {
        return $this->advantage->getName();
    }
}
