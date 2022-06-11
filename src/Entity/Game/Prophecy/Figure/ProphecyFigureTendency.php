<?php

namespace App\Entity\Game\Prophecy\Figure;
 
use App\Repository\Game\Prophecy\Figure\ProphecyFigureTendencyRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureTendencyRepository::class)
 */
class ProphecyFigureTendency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * a tendency object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tendency;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $circles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tendencyValue;
    
    
    public function __construct()
    {
        $this->setCircles (0);
        $this->setTendencyValue (0);
    }

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

    public function getTendency(): ?ProphecyTendency
    {
        return $this->tendency;
    }

    public function setTendency(ProphecyTendency $tendency): self
    {
        $this->tendency = $tendency;

        return $this;
    }

    public function getCircles(): ?int
    {
        return $this->circles;
    }

    public function setCircles(int $circles): self
    {
        $this->circles = $circles;

        return $this;
    }

    public function getTendencyValue(): ?int
    {
        return $this->tendencyValue;
    }

    public function setTendencyValue(int $tendencyValue): self
    {
        $this->tendencyValue = $tendencyValue;

        return $this;
    }
}
