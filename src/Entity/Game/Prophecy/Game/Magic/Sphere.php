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
 * @ORM\Entity(repositoryClass=SphereRepository::class)
 * @UniqueEntity(fields={"name"}, errorPath="name", message="Il existe déjà un sort avec cet nom")
 */
class Sphere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
}
