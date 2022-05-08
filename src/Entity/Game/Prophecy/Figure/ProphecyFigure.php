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
use App\Entity\Game\Campaign;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use App\Entity\Game\Prophecy\Game\World\ProphecyNation;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Game\Prophecy\Game\Item\ProphecyWeapon;
use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use App\Entity\Game\Prophecy\Game\Item\ProphecyShield;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic;
use App\Entity\Game\Prophecy\Game\Caste\prophecyFavour;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;
use App\Entity\Game\FigureInterface;


/**
 * @ORM\Entity(repositoryClass=ProphecyFigureRepository::class)
 * 
 */
class ProphecyFigure implements FigureInterface
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campaign;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste")
     * @ORM\JoinColumn(nullable=true)
     */
    private $caste;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen")
     * @ORM\JoinColumn(nullable=true)
     */
    private $omen;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge")
     * @ORM\JoinColumn(nullable=true)
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
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $xperience;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $caracteristics;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $majorAttributes;
   
    
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
     * Many Figures have many shields.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Item\ProphecyShield")
     * @ORM\JoinTable(name="prophecy_figures_shields",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="shield_id", referencedColumnName="id")}
     *      )
     */
    private $shields;
    
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
     * Many Figures have many advantages.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage")
     * @ORM\JoinTable(name="prophecy_figures_advantages",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="advantage_id", referencedColumnName="id")}
     *      )
     */
    private $advantages;
    
    /**
     * Many Figures have many disadvantages.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage")
     * @ORM\JoinTable(name="prophecy_figures_disadvantages",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="disadvantage_id", referencedColumnName="id")}
     *      )
     */
    private $disadvantages;
    
    /**
     * Many Figures have many technics.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic")
     * @ORM\JoinTable(name="prophecy_figures_technics",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="technic_id", referencedColumnName="id")}
     *      )
     */
    private $technics;
    
    /**
     * Many Figures have many favours.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour")
     * @ORM\JoinTable(name="prophecy_figures_favours",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="favour_id", referencedColumnName="id")}
     *      )
     */
    private $favours;
    
    /**
     * Many Figures have many benefits.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit")
     * @ORM\JoinTable(name="prophecy_figures_benefits",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="benefit_id", referencedColumnName="id")}
     *      )
     */
    private $benefits;
    
    /**
     * Many Figures have many prohibiteds.
     * @ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited")
     * @ORM\JoinTable(name="prophecy_figures_prohibiteds",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="prohibited_id", referencedColumnName="id")}
     *      )
     */
    private $prohibiteds;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    private $background;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isFinish;
    

    /**
     * @return mixed
     */
    public function getBackground(): ?string
    {
        return $this->background;
    }

    /**
     * @param mixed $background
     */
    public function setBackground($background): self
    {
        $this->background = $background;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXperience(): ?int
    {
        return $this->xperience;
    }

    /**
     * @param mixed $xperience
     */
    public function setXperience(int $xperience): self
    {
        $this->xperience = $xperience;
        
        return $this;
    }

    public function __construct()
    {
        $this->weapons = new ArrayCollection();    
        $this->armors = new ArrayCollection();
        $this->spells = new ArrayCollection();
        $this->caracteristics = new ArrayCollection();
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
    
    public function getWeapons()
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
    
    public function addAdvantage(ProphecyAdvantage $advantage)
    {
        if(!$this->advantages->contains($advantage))
        {
            $this->advantages->add($advantage);
        }
        
        return $this;
    }
    
    public function removeAdvantage(ProphecyAdvantage $advantage)
    {
        if($this->advantages->contains($advantage))
        {
            $this->advantages->remove($advantage);
        }
        
        return $this;
    }
    
    public function getAdvantages()
    {
        return $this->advantages;
    }
    
    public function addDisadvantage(ProphecyDisadvantage $disadvantage)
    {
        if(!$this->disadvantages->contains($disadvantage))
        {
            $this->disadvantages->add($disadvantage);
        }
        
        return $this;
    }
    
    public function removeDisadvantage(ProphecyDisadvantage $disadvantage)
    {
        if($this->disadvantages->contains($disadvantage))
        {
            $this->disadvantages->remove($disadvantage);
        }
        
        return $this;
    }
    
    public function getDisadvantages()
    {
        return $this->disadvantages;
    }
    
    public function addShield(ProphecyShield $shield)
    {
        if(!$this->shields->contains($shield))
        {
            $this->shields->add($shield);
        }
        
        return $this;
    }
    
    public function removeShield(ProphecyShield $shield)
    {
        if($this->shields->contains($shield))
        {
            $this->shields->remove($shield);
        }
        
        return $this;
    }
    
    public function getShields()
    {
        return $this->shields;
    }
    
    public function addTehnic(ProphecyTechnic $technic)
    {
        if(!$this->technics->contains($technic))
        {
            $this->technics->add($technic);
        }
        
        return $this;
    }
    
    public function removeTechnic(ProphecyTechnic $technic)
    {
        if($this->technics->contains($technic))
        {
            $this->technics->remove($technic);
        }
        
        return $this;
    }
    
    public function getTechnics()
    {
        return $this->technics;
    }
    
    public function addFavour(prophecyFavour $favour)
    {
        if(!$this->favours->contains($favour))
        {
            $this->favours->add($favour);
        }
        
        return $this;
    }
    
    public function removeFavour(prophecyFavour $favour)
    {
        if($this->favours->contains($favour))
        {
            $this->favours->remove($favour);
        }
        
        return $this;
    }
    
    public function getFavours()
    {
        return $this->favours;
    }
    
    public function addBenefit(ProphecyBenefit $benefit)
    {
        if(!$this->benefits->contains($benefit))
        {
            $this->benefits->add($benefit);
        }
        
        return $this;
    }
    
    public function removeBenefit(ProphecyBenefit $benefit)
    {
        if($this->benefits->contains($benefit))
        {
            $this->benefits->remove($benefit);
        }
        
        return $this;
    }
    
    public function getBenefits()
    {
        return $this->benefits;
    }
    
    public function addProhibited(ProphecyProhibited $prohibited)
    {
        if(!$this->prohibiteds->contains($prohibited))
        {
            $this->prohibiteds->add($prohibited);
        }
        
        return $this;
    }
    
    public function removeProhibited(ProphecyProhibited $prohibited)
    {
        if($this->prohibiteds->contains($prohibited))
        {
            $this->prohibiteds->remove($prohibited);
        }
        
        return $this;
    }
    
    public function getProhibiteds()
    {
        return $this->prohibiteds;
    }
    
    public function addCaracteristic($figureCaracteristic)
    {
        if($figureCaracteristic != null && (!$this->caracteristics->contains($figureCaracteristic))  )
        {
            $this->caracteristics->add($figureCaracteristic);
        }
        
        return $this;
    }
    
    public function removeCaracteristic(ProphecyFigureCaracteristic $caracteristic)
    {
        //no caracteristic removal
     
    }
    
    public function getCaracteristics()
    {
        return $this->caracteristics;
    }
    
    public function getMajorAttributes()
    {
        return $this->majorAttributes;
    }
    
    public function __toString(): ?string
    {
        return $this->getName();
    }
    
    public function setDecrease(int $value)
    {}

    public function setIncrease(int $value)
    {}

    public function getCurrentPoints()
    {}

}
