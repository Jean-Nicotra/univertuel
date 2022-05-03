<?php

namespace App\Entity\Platform\Message;

use App\Repository\Platform\Message\ThreadRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User\User;

/**
 * @ORM\Entity(repositoryClass=ThreadRepository::class)
 */
class Thread
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn (nullable=false)
     * User who send the thread
     */
    private $sender;
    
    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn (nullable=false)
     */
    private $receiver;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $isReceiverDeleted;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $isSenderDeleted;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $purpose;
    
    public function __construct()
    {
    	$this->setIsReceiverDeleted(false);
    	$this->setIsSenderDeleted(false);
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getSender(): ?User
    {
        return $this->sender;
    }
    
    public function setSender($sender): self
    {
        $this->sender = $sender;
        
        return $this;
    }
    
    public function getReceiver(): ?User
    {
        return $this->receiver;
    }
    
    public function setReceiver(User $receiver): self
    {
        $this->receiver = $receiver;
        
        return $this;
    }
    
    public function getIsReceiverDeleted(): ?bool
    {
        return $this->isReceiverDeleted;
    }
    
    public function setIsReceiverDeleted(bool $isReceiverDeleted): self
    {
        $this->isReceiverDeleted = $isReceiverDeleted;
        
        return $this;
    }
    
    public function isSenderDeleted(): ?bool
    {
        return $this->isSenderDeleted;
    }
    
    public function setIsSenderDeleted(bool $isSenderDeleted): self
    {
        $this->isSenderDeleted = $isSenderDeleted;
        
        return $this;
    }
    
    public function getPurpose(): ?string
    {
        return $this->purpose;
    }
    
    public function setPurpose(string $purpose): self
    {
        $this->purpose = $purpose;
        
        return $this;
    }
}