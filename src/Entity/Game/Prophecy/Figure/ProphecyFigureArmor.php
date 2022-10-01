<?php

namespace App\Entity\Game\Prophecy\Figure;
 
use App\Repository\Game\Prophecy\Figure\ProphecyFigureArmorRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureArmorRepository::class)
 */
class ProphecyFigureArmor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="armors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;
    
    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyArmor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $armor;
    
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @return \App\Entity\Game\Prophecy\Figure\ProphecyFigure
     */
    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\Item\ProphecyArmor
     */
    public function getArmor(): ?ProphecyArmor
    {
        return $this->armor;
    }

    /**
     * @return mixed
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Figure\ProphecyFigure $figure
     */
    public function setFigure($figure)
    {
        $this->figure = $figure;
        
        return $this;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Item\ProphecyArmor $armor
     */
    public function setArmor($armor)
    {
        $this->armor = $armor;
        
        return $this;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
