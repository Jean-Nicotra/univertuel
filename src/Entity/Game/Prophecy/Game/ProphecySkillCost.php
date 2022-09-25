<?php

namespace App\Entity\Game\Prophecy\Game;

use App\Repository\Game\Prophecy\Game\ProphecySkillCostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProphecySkillCostRepository::class)
 */
class ProphecySkillCost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $score;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $value;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $sum;

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
 