<?php
/******************************************************************************************************************
    name      : Weapon.php
    Role      : entity Weapon, store data of a Weapon 
    author    : tristesire
    date      : 18/03/2022
******************************************************************************************************************/

namespace App\Entity\Prophecy\Game\Inventory;

//use App\Repository\Game\GameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=WeaponRepository::class)
 * @UniqueEntity(fields={"name"}, errorPath="name", message="Il existe déjà un sort avec cet nom")
 */
class Weapon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


}
