<?php
namespace App\Entity\Game\Prophecy\Game;

interface Stat
{
    public function getName();
    
    public function getShortName();
    
    public function getMinValue();
    
    public function getMaxValue();
    
    public function getXPIncrease();
}

