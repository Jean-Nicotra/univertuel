<?php

namespace App\Entity\Game\Prophecy\Figure;
 
use App\Repository\Game\Prophecy\Figure\ProphecyFigureShieldRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Item\ProphecyShield;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureShieldRepository::class)
 */
class ProphecyFigureShield
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="weapons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;
    
    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyShield")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shield;
    
    
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
     * @return \App\Entity\Game\Prophecy\Game\Item\ProphecyShield
     */
    public function getShield(): ?ProphecyShield
    {
        return $this->shield;
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
    public function setFigure(ProphecyFigure $figure): self
    {
        $this->figure = $figure;
        
        return $this;
    }
    
    /**
     * @param \App\Entity\Game\Prophecy\Game\Item\ProphecyShield $shield
     */
    public function setShield(ProphecyShield $shield): self
    {
        $this->shield = $shield;
        
        return $this;
    }
    
    /**
     * @param mixed $comment
     */
    public function setComment($comment): self
    {
        $this->comment = $comment;
        
        return $this;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }
}
