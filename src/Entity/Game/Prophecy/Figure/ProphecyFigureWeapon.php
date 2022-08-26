<?php

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureWeaponRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureWeaponsRepository::class)
 */
class ProphecyFigureWeapon
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $weapon;
    
    
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
     * @return \App\Entity\Game\Prophecy\Figure\ProphecyFigure
     */
    public function getWeapon(): ?ProphecyWeapon
    {
        return $this->weapon;
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
     * @param \App\Entity\Game\Prophecy\Figure\ProphecyFigure $weapon
     */
    public function setWeapon($weapon)
    {
        $this->weapon = $weapon;
        
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
