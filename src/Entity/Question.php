<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
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
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="question")
     */
    private $reponses;

    /**
     * @ORM\OneToMany(targetEntity=Defi::class, mappedBy="question")
     */
    private $defis;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Validated;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->defis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection<int, Reponse>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setQuestion($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestion() === $this) {
                $reponse->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Defi>
     */
    public function getDefis(): Collection
    {
        return $this->defis;
    }

    public function addDefi(Defi $defi): self
    {
        if (!$this->defis->contains($defi)) {
            $this->defis[] = $defi;
            $defi->setQuestion($this);
        }

        return $this;
    }

    public function removeDefi(Defi $defi): self
    {
        if ($this->defis->removeElement($defi)) {
            // set the owning side to null (unless already changed)
            if ($defi->getQuestion() === $this) {
                $defi->setQuestion(null);
            }
        }

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function __toString() : String{
        return $this->getIntitule() . ' (' . $this->getPoints() . ' points)' ;
    }

    public function isValidated(): ?bool
    {
        return $this->Validated;
    }

    public function setValidated(?bool $Validated): self
    {
        $this->Validated = $Validated;

        return $this;
    }
}
