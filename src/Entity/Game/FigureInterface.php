<?php
namespace App\Entity\Game;

interface FigureInterface
{
    public function getCurrentPoints();
    
    public function setIncrease (int $value);
    
    public function setDecrease (int $value);
    
    public function getName();
}

