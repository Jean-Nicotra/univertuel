<?php

namespace App\Entity\Game\Prophecy\Game\Characteristic;
  
use App\Repository\Game\Prophecy\Game\Characteristic\ProphecyInjuryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProphecyInjuryRepository::class)
 */
class ProphecyInjuryold
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
