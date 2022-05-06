<?php
/******************************************************************************************************************
    name      : Campaign.php
    Role      : entity Campaign, store data of a campaign 
    author    : tristesire
    date      : 24/03/2021
******************************************************************************************************************/

namespace App\Entity\Game;

use App\Repository\Game\CampaignRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Game;
use App\Entity\User\User;
 

/**
 * @ORM\Entity(repositoryClass=CampaignRepository::class)
 * 
 */
class Campaign
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * identify a campaign by name
     * @ORM\Column(type="string", length=120)
     * 
     */
    private $name;
    
    /**
     * user who own the campaign and created it
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;
    
    /**
     * game which is link to. Can't create a campaign out of a game
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Game")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;
    
    /**
     * some words to describe the campaign
     * @ORM\Column(type="text", length=5000)
     *
     */
    private $description;
    
    /**
     * for future use to secure figure creation
     * @ORM\Column(type="integer")
     */
    private $secretCode;

    
    
    

    public function __construct()
    {
        $this->setSecretCode();
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
    public function getName(): ?string
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

    public function getGame(): ?Game
    {
        return $this->game;
    }
    
    public function setGame(Game $game): self
    {
        $this->game = $game;
        
        return $this;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function setDescription($description): self
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getSecretCode(): ?int
    {
        return $this->secretCode;
    }
    
    /**
     * @param mixed $secretCode
     * range 100000-999999
     */
    public function setSecretCode(): self
    {
        $random = random_int(100000, 999999);
        $this->secretCode = $random;

        return $this;
    }
    

}
