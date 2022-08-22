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
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tendencies;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $majorAttributes;
   
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $minorAttributes;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $skills;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $spheres;
    
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
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $currencies;
    
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
     * ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage")
     * ORM\JoinTable(name="prophecy_figures_advantages",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="advantage_id", referencedColumnName="id")}
     *      )
     */
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureAdvantage", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $advantages;
    
    
    
    /**
     * Exemple de ManyToMany Simple
     * ORM\ManyToMany(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage")
     * ORM\JoinTable(name="prophecy_figures_disadvantages",
     *      joinColumns={@ORM\JoinColumn(name="figure_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="disadvantage_id", referencedColumnName="id")}
     *      )
     */
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $disadvantages;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $advantagePoints;    
    
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited")
     * @ORM\JoinColumn(nullable=true)
     *
    private $prohibited;
    */
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigureProhibited", mappedBy="figure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $prohibiteds;
    
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $freePoints;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    private $background;
    
    /**
     * @ORM\Column(type="string", nullable=true, length="255")
     *
     */
    private $disadvantagesComment;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isMajorAttributesChoosen;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isMinorAttributesChoosen;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isCaracteristicsChoosen;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isTendenciesChoosen;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     */
    private $isInitialCurrenciesGenerated;
    
   
    /**
     * @ORM\Column(type="string", nullable=true, length="120")
     *
     */
    private $image;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isFinish;
    
    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $isValide;
   
    

    /**
     * @return mixed
     */
    public function getIsInitialCurrenciesGenerated()
    {
        return $this->isInitialCurrenciesGenerated;
    }

    /**
     * @param mixed $isInitialCurrenciesGenerated
     */
    public function setIsInitialCurrenciesGenerated($isInitialCurrenciesGenerated)
    {
        $this->isInitialCurrenciesGenerated = $isInitialCurrenciesGenerated;
    }

    /**
     * @return mixed
     */
    public function getIsValide()
    {
        return $this->isValide;
    }

    /**
     * @param mixed $isValide
     */
    public function setIsValide($isValide)
    {
        $this->isValide = $isValide;
    }

    /**
     * @return mixed
     */
    public function getDisadvantagesComment()
    {
        return $this->disadvantagesComment;
    }

    /**
     * @param mixed $disadvantagesComment
     */
    public function setDisadvantagesComment($disadvantagesComment)
    {
        $this->disadvantagesComment = $disadvantagesComment;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsTendenciesChoosen(): ?bool
    {
        return $this->isTendenciesChoosen;
    }

    /**
     * @param mixed $isTendenciesChoosen
     */
    public function setIsTendenciesChoosen($isTendenciesChoosen): self
    {
        $this->isTendenciesChoosen = $isTendenciesChoosen;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsMajorAttributesChoosen(): ?bool
    {
        return $this->isMajorAttributesChoosen;
    }

    /**
     * @param mixed $isMajorAttributesChoosen
     */
    public function setIsMajorAttributesChoosen($isMajorAttributesChoosen): self
    {
        $this->isMajorAttributesChoosen = $isMajorAttributesChoosen;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function getIsMinorAttributesChoosen(): ?bool
    {
        return $this->isMinorAttributesChoosen;
    }
    
    /**
     * @param mixed $isMajorAttributesChoosen
     */
    public function setIsMinorAttributesChoosen($isMinorAttributesChoosen): self
    {
        $this->isMinorAttributesChoosen = $isMinorAttributesChoosen;
        
        return $this;
    }
    

    /**
     * @return mixed
     */
    public function getIsCaracteristicsChoosen(): ?bool
    {
        return $this->isCaracteristicsChoosen;
    }

    /**
     * @param mixed $isCaracteristicsChoosen
     */
    public function setIsCaracteristicsChoosen($isCaracteristicsChoosen): self
    {
        $this->isCaracteristicsChoosen = $isCaracteristicsChoosen;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): self
    {
        $this->image = $image;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdvantagePoints(): ?int
    {
        return $this->advantagePoints;
    }

    /**
     * @param mixed $advantagePoints
     */
    public function setAdvantagePoints($advantagePoints): self
    {
        $this->advantagePoints = $advantagePoints;
        
        return $this;
    }
    
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
        $this->minorAttributes = new ArrayCollection();
        $this->majorAttributes = new ArrayCollection();
        $this->setXperience(70);
        $this->setFreePoints(2);
        $this->setIsCaracteristicsChoosen(false);
        $this->setIsMajorAttributesChoosen(false);
        $this->setIsMinorAttributesChoosen(false);
        $this->setIsTendenciesChoosen(false);
        $this->disadvantages = new ArrayCollection();
        $this->spheres = new ArrayCollection();
        $this->setIsFinish(false);
        $this->setIsValide(false);
        $this->setIsInitialCurrenciesGenerated(false);
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
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getFreePoints()
    {
        return $this->freePoints;
    }
    
    /**
     * @param mixed $freePoints
     */
    public function setFreePoints($freePoints)
    {
        $this->freePoints = $freePoints;
        
        return $this;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }
    
    public function setReputation (int $reputation): self
    {
        $this->reputation = $reputation;
        
        return $this;
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
    
    public function setProhibited($prohibited): self
    {
        $this->prohibited = $prohibited;
        
        return $this;
    }
    
    /*
    public function getProhibited(): ?ProphecyProhibited
    {
        return $this->prohibited;
    }
    */
    
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
    
    public function getMinorAttributes ()
    {
        return $this->minorAttributes;
    }
    
    public function getTendencies()
    {
        return $this->tendencies;
    }
    
    public function getCurrencies()
    {
        return $this->currencies;
    }
    
    public function getDisadvantages()
    {
        return $this->disadvantages;
    }
    
    public function getAdvantages()
    {
        return $this->advantages;
    }
    
    
    public function getSkills()
    {
        return $this->skills;
    }
    
    public function getSpheres()
    {
        return $this->spheres;
    }
    
    public function getProhibiteds()
    {
        return $this->prohibiteds;
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
