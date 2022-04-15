<?php

namespace App\Entity\Platform\Message;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\User\User;
use App\Repository\Platform\Message\MessageRepository;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
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
    private $isSenderReaded;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $isReceiverReaded;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $number;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    
    /**
     * @ORM\Column(type="text")
     */
    private $message;
    
    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Platform\Message\Thread", cascade={"persist"})
     * @ORM\JoinColumn (nullable=false)
     */
    private $thread;
    
    public function __construct()
    {
        $this->setDate(new \DateTime());
        $this->setIsSenderReaded(false);
        $this->setIsReceiverReaded(false);
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
    
    public function getIsSenderReaded(): ?bool
    {
        return $this->isSenderReaded;
    }
    
    public function setIsSenderReaded(bool $isSenderReaded): self
    {
        $this->isSenderReaded = $isSenderReaded;
        
        return $this;
    }
    
    public function getIsReceiverReaded(): ?bool
    {
        return $this->isReceiverReaded;
    }
    
    public function setIsReceiverReaded(bool $isReceiverReaded): self
    {
        $this->isReceiverReaded = $isReceiverReaded;
        
        return $this;
    }
    
    public function setMessage(string $message): self
    {
        $this->message = $message;
        
        return $this;
    }
    
    public function getNumber(): ?int
    {
        return $this->number;
    }
    
    public function setNumber(int $number): self
    {
        $this->number = $number;
        
        return $this;
    }
    
    
    public function getDate (): ?string
    {
        return $this->date->format(('j M Y  à H:i:s'));
    }
    
    public function setDate($date): self
    {
        $this->date = $date;
        
        return $this;
    }
    
    public function getMessage(): ?string
    {
        return $this->message;
    }
    
    public function getThread(): ?Thread
    {
        return $this->thread;
    }
    
    public function setThread(Thread $thread): self
    {
        $this->thread = $thread;
        
        return $this;
    }
}