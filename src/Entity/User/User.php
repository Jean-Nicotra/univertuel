<?php
/******************************************************************************************************************
    name      : User.php
    Role      : entity User, store data of a signed person 
    author    : tristesire
    date      : 18/02/2021
******************************************************************************************************************/

namespace App\Entity\User;

use App\Repository\User\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, errorPath="email", message="Il existe déjà un compte avec cet email")
 * @UniqueEntity(fields={"username"}, errorPath="username", message="Il existe déjà un compte avec cet identifiant")
 */
class User implements UserInterface
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
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $username;



    public function __construct()
    {
        $this->setIsActive(true);
        //$this->setCreaDate(new \DateTime());
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    
    public function __toString(): ?string
    {
        return $this->username;
    }

    /**
     * 
     */
    public function getRoles(): ?array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_MEMBER';
        
        return array_unique($roles);
    }
    
    /**
     * Role : A visual identifier that represents this user.
     * configure config/packages/security  property: email 
     * if you want to use another username, and change return property 
     * 
     * 
     */
    public function getUsername(): ?string
    {
        return (string) $this->username;
    }

    /**
     * Role : set user's role for authorizations.
     * configure config/packages/security   role_hierarchy 
     * param role is array, but use only the highest role of the user 
     * @param array $roles
     * @return self
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * 
     *
     *
     * 
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    
    /**
     * 
     * @param string $password
     * @return self
     */
    public function setPassword($password): self
    {
        if ($password)
        {
            $this->password = $password;
        }

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * 
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * 
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /*
    public function getCreaDate(): ?string
    {
        return $this->creaDate->format('d/m/Y à H:i:s');
    }

    public function setCreaDate(\DateTime $creaDate): self
    {
        $this->creaDate = $creaDate;
        
        return $this;
    }
    */

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }



}
