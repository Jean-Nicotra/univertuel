<?php
namespace App\Entity\Prophecy\Figure;

interface Variable
{
    
    public function getCurrentPoints();
    
    public function setIncrease (int $value);
    
    public function setDecrease (int $value);
}

