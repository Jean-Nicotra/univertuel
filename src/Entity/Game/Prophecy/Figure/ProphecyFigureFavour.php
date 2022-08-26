<?php

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureFavourRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
 
/**
 * @ORM\Entity(repositoryClass=ProphecyFigureFavourRepository::class)
 */
class ProphecyFigureFavour
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $favour;
    
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
     * @return \App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline
     */
    public function getFavour(): ?ProphecyFavour
    {
        return $this->favour;
    }

    /**
     * @return mixed
     */
    public function getComment(): ?String
    {
        return $this->comment;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Figure\ProphecyFigure $figure
     */
    public function setFigure(ProphecyFigure $figure)
    {
        $this->figure = $figure;
        
        return $this;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline $favour
     */
    public function setFavour($favour)
    {
        $this->favour = $favour;
        
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
