<?php
/******************************************************************************************************************
    name      : ProphecyBenefit.php
    Role      : entity ProphecyBenefit, store data of a caste benefit - un bénéfice de caste in french -  
    author    : tristesire
    date      : 18/02/2021
******************************************************************************************************************/


namespace App\Entity\Game\Prophecy\Game\Caste;

use App\Repository\Game\Prophecy\Game\Caste\ProphecyBenefitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProphecyBenefitRepository::class)
 */
class ProphecyBenefit
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste")
     * @ORM\JoinColumn(nullable=false)
     */
    private $caste;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Campaign")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;
    
    
    private $description;

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return ucfirst($this->name);
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): self
    {
        $this->name = strtolower($name);
        
        return $this;
    }

    /**
     * @return \App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste
     */
    public function getCaste()
    {
        return $this->caste;
    }

    /**
     * @return \App\Entity\Game\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste $caste
     */
    public function setCaste($caste)
    {
        $this->caste = $caste;
    }

    /**
     * @param \App\Entity\Game\Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * 
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
