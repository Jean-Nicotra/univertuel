<?php

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureSkillRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureSkillRepository::class)
 */
class ProphecyFigureSkill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="skills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skill;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $value;
    
    public function __construct()
    {
        $this->setValue(0);
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

    public function getSkill(): ?ProphecySkill
    {
        return $this->skill;
    }

    public function setSkill(ProphecySkill $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
