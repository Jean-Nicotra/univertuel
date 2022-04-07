<?php

namespace App\Entity\Game\Prophecy\Game\Characteristic;

use App\Repository\Game\Prophecy\Game\Characteristic\ProphecySkillCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProphecySkillCategoryRepository::class)
 */
class ProphecySkillCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute")
     * @ORM\JoinColumn(nullable=false)
     */
    private $majorAttribute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMajorAttribute(): ?ProphecyMajorAttribute
    {
        return $this->majorAttribute;
    }

    public function setMajorAttribute($majorAttribute): self
    {
        $this->majorAttribute = $majorAttribute;

        return $this;
    }
}
