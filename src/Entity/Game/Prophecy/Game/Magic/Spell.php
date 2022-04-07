<?php
/******************************************************************************************************************
    name      : Spell.php
    Role      : entity Spell, store data of a spell 
    author    : tristesire
    date      : 18/03/2022
******************************************************************************************************************/

namespace App\Entity\Prophecy\Game\Magic;

//use App\Repository\Game\GameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=SpellRepository::class)
 * @UniqueEntity(fields={"name"}, errorPath="name", message="Il existe déjà un sort avec cet nom")
 */
class Spell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @ORM\Column(type="integer", length=30)
     */
    private $level;
    
    /**
     * @ORM\Column(type="integer", length=30)
     */
    private $complexity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prophecy\Game\Magic\Discipline")
     * @ORM\JoinColumn(nullable=false)
     */
    private $discipline;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prophecy\Game\Magic\Sphere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sphere;
    
    /**
     * @ORM\Column(type="integer", length=30)
     */
    private $cost;
    
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $castingTime;

    /**
     * @ORM\Column(type="integer", length=30)
     */
    private $difficulty;
    
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    
    public function __construct()
    {
        
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function __toString()
    {
        return $this->name;
    }
    
    
    
    
    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getComplexity(): ?int
    {
        return $this->complexity;
    }

    /**
     * @return mixed
     */
    public function getDiscipline(): ?string
    {
        return $this->discipline;
    }

    /**
     * @return mixed
     */
    public function getSphere(): ?Sphere
    {
        return $this->sphere;
    }

    /**
     * @return mixed
     */
    public function getCost(): ?string
    {
        return $this->cost;
    }

    /**
     * @return mixed
     */
    public function getCastingTime(): ?string
    {
        return $this->castingTime;
    }

    /**
     * @return mixed
     */
    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    /**
     * @return mixed
     */
    public function getDescription(): ?Discipline
    {
        return $this->description;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name):self
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * @param mixed $level
     */
    public function setLevel(int $level):self
    {
        $this->level = $level;
        
        return $this;
    }

    /**
     * @param mixed $complexity
     */
    public function setComplexity(int $complexity):self
    {
        $this->complexity = $complexity;
        
        return $this;
    }

    /**
     * @param mixed $discipline
     */
    public function setDiscipline(Discipline $discipline):self
    {
        $this->discipline = $discipline;
        
        return $this;
    }

    /**
     * @param mixed $sphere
     */
    public function setSphere(Sphere $sphere):self
    {
        $this->sphere = $sphere;
        
        return $this;
    }

    /**
     * @param mixed $cost
     */
    public function setCost(int $cost):self
    {
        $this->cost = $cost;
        
        return $this;
    }

    /**
     * @param mixed $castingTime
     */
    public function setCastingTime(string $castingTime):self
    {
        $this->castingTime = $castingTime;
        
        return $this;
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty(int $difficulty):self
    {
        $this->difficulty = $difficulty;
        
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description):self
    {
        $this->description = $description;
        
        return $this;
    }
}
