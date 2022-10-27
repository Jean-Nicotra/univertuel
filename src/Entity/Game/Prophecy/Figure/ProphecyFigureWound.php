<?php

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureWoundRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureWoundRepository::class)
 */
class ProphecyFigureWound
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="wounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds")
     * @ORM\JoinColumn(nullable=true)
     */
    private $wounds;


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

    public function getWounds(): ?ProphecyWounds
    {
        return $this->wounds;
    }

    public function setWound(ProphecyWounds $wounds): self
    {
        $this->wounds = $wounds;

        return $this;
    }
       

}
