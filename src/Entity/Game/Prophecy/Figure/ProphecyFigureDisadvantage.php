<?php
 
namespace App\Entity\Game\Prophecy\Figure;

use App\Repository\Game\Prophecy\Figure\ProphecyFigureDisadvantageRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;

/**
 * @ORM\Entity(repositoryClass=ProphecyFigureDisadvantageRepository::class)
 */
class ProphecyFigureDisadvantage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * the figure object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Figure\ProphecyFigure", inversedBy="disadvantages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $figure;

    /**
     * a major attribute object
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $disadvantage;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFigure(): ?ProphecyFigure
    {
        return $this->figure;
    }

    public function setFigure($figure): self
    {
        $this->figure = $figure;

        return $this;
    }

    public function getDisadvantage(): ?ProphecyDisadvantage
    {
        return $this->disadvantage;
    }

    public function setDisadvantage($disadvantage): self
    {
        $this->disadvantage = $disadvantage;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
    
}
