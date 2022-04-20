<?php
/******************************************************************************************************************
    name      : Figure.php
    Role      : entity Figure, store data of a character 
    author    : tristesire
    date      : 24/03/2021
******************************************************************************************************************/

namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User\User;
use App\Entity\Campaign\Campaign;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use App\Entity\Game\Prophecy\Game\World\ProphecyNation;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;


/**
 * @ORM\Entity(repositoryClass=ProphecyFigureRepository::class)
 * 
 */
class ProphecyFigure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=120)
     * 
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign\Campaign")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campaign;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste")
     * @ORM\JoinColumn(nullable=false)
     */
    private $caste;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $omen;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $age;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $mana;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $reputation;
    
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $currentMana;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $weight;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $size;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\World\ProphecyNation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $nation;
   
    
    /**
     * Many Figures have many weapons.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon")
     * @ORM\JoinTable(name="prophecy_figures_weapons",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="weapon_id", referencedColumnName="id")}
     *      )
     */
    private $weapons;
    
    /**
     * Many Figures have many armors.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyArmor")
     * @ORM\JoinTable(name="prophecy_figures_armors",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="armor_id", referencedColumnName="id")}
     *      )
     */
    private $armors;
    
    /**
     * Many Figures have many spells.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Magic\ProphecySpell")
     * @ORM\JoinTable(name="prophecy_figures_spells",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="spell_id", referencedColumnName="id")}
     *      )
     */
    private $spells;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isFinish;
    

    public function __construct()
    {
        $this->weapons = new ArrayCollection();    
        $this->armors = new ArrayCollection();
        $this->spells = new ArrayCollection();
    }
    
    
    /**
     * @return mixed
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @return mixed
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\World\ProphecyNation
     */
    public function getNation(): ?ProphecyNation
    {
        return $this->nation;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;
        
        return $this;
    }

    /**
     * @param mixed $size
     */
    public function setSize(int $size): self
    {
        $this->size = $size;
        
        return $this;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\World\ProphecyNation $nation
     */
    public function setNation(ProphecyNation $nation): self
    {
        $this->nation = $nation;
        
        return $this;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste
     */
    public function getCaste(): ?ProphecyCaste
    {
        return $this->caste;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen
     */
    public function getOmen(): ?ProphecyOmen
    {
        return $this->omen;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge
     */
    public function getAge(): ?ProphecyAge
    {
        return $this->age;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste $caste
     */
    public function setCaste(ProphecyCaste $caste): self
    {
        $this->caste = $caste;
        
        return $this;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen $omen
     */
    public function setOmen(ProphecyOmen $omen): self
    {
        $this->omen = $omen;
        
        return $this;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge $age
     */
    public function setAge(ProphecyAge $age): self
    {
        $this->age = $age;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsFinish(): bool
    {
        return $this->isFinish;
    }

    /**
     * @param mixed $isFinish
     */
    public function setIsFinish(bool $isFinish): self
    {
        $this->isFinish = $isFinish;
        
        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOwner(): ?User
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $user
     */
    public function setOwner($owner):self
    {
        $this->owner = $owner;
        
        return $this;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name):self
    {
        $this->name = $name;
        
        return $this;
    }

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }
    
    public function setCampaign($campaign): self
    {
        $this->campaign = $campaign;
        
        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }
    
    public function setMana(int $mana): self
    {
        $this->mana = $mana;
        
        return $this;
    }
    
    public function getCurrentMana(): ?int
    {
        return $this->currentMana;
    }
    
    public function setCurrentMana(int $value)
    {
        $this->currentMana = $value;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }
    
    public function setReputation (int $reputation): self
    {
        $this->reputation = $reputation;
    }
    
    public function addWeapon(ProphecyWeapon $weapon)
    {
        if(!$this->weapons->contains($weapon))
        {
            $this->weapons->add($weapon);
        }
        
        return $this;
    }
    
    public function removeWeapon(ProphecyWeapon $weapon)
    {
        if($this->weapons->contains($weapon))
        {
            $this->weapons->remove($weapon);
        }
        
        return $this;
    }
    
    public function getWeapons(): ?ArrayCollection
    {
        return $this->weapons;
    }
    
    public function addArmor(ProphecyArmor $armor)
    {
        if(!$this->armors->contains($armor))
        {
            $this->armors->add($armor);
        }
        
        return $this;
    }
    
    public function removeArmor(ProphecyArmor $armor)
    {
        if($this->armors->contains($armor))
        {
            $this->armors->remove($armor);
        }
        
        return $this;
    }
    
    public function getArmors()
    {
        return $this->armors;
    }
    
    public function addSpell(ProphecySpell $spell)
    {
        if(!$this->spells->contains($spell))
        {
            $this->spells->add($spell);
        }
        
        return $this;
    }
    
    public function removeSpell(ProphecySpell $spell)
    {
        if($this->spells->contains($spell))
        {
            $this->spell->remove($spell);
        }
        
        return $this;
    }
    
    public function getSpells()
    {
        return $this->spells;
    }
}
