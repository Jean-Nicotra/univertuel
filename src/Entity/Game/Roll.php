<?php

/*****************************************************************************************
 * Role : Simuler le lancer de dés
 * 
 * utilisation : $roll = new Roll($dice, $number, $issum)
 * $value = $roll->getRoll()
 * getSum() retourne la somme du lancé
 * getRolls() retourne un tableau contenant autant de valeurs que $number
 * 
 ******************************************************************************************/

namespace App\Entity\Game; 


class Roll
{    
    private $dice;
    
    private $number; 
    
    
    public function __construct(int $dice, int $number)
    {
        $this->setDice($dice);
        $this->setNumber($number);
    }
    
    /**
     * @return mixed
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }
    
    /**
     * @param mixed $number
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }
    
    
    /**
     * @return mixed
     */
    public function getDice(): ?int
    {
        return $this->dice;
    }
    
    
    /**
     * @param mixed $dice
     */
    public function setDice(int $dice)
    {
        $this->dice = $dice;
    }
    
    public function rollDice (): ?int
    {
        $result= random_int(1,$this->getDice());
        return $result;;
    }
    
    /*
     * retourne $result
     * sous forme de somme  
     */
    public function getSum()
    {
        $result = 0;
        for($i = 0 ; $i < $this->getNumber() ; $i++)
        {
            $result += $this->rollDice();
        }
        
        return $result;
    }
    
    /*
     * retourne $results
     * sous forme de tableau de valeurs
     */
    public function getDices()
    {
        $results = [];
        for($i = 0 ; $i < $this->getNumber() ; $i++)
        {
            $results[$i] = $this->rollDice();
        }
        
        return $results;
    }
    
}
