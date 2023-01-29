<?php

namespace App\Entity;

use App\Repository\DefiRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=DefiRepository::class)
 */
class Defi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="defis")
     */
    private $JoueurOrigin;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="defis")
     */
    private $JoueurDestinataire;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="defis")
     */
    private $question;

    /**
     * @var \DateTime $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime" ,nullable=false)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $limit_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_reponse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoueurOrigin(): ?Joueur
    {
        return $this->JoueurOrigin;
    }

    public function setJoueurOrigin(?Joueur $JoueurOrigin): self
    {
        $this->JoueurOrigin = $JoueurOrigin;

        return $this;
    }

    public function getJoueurDestinataire(): ?Joueur
    {
        return $this->JoueurDestinataire;
    }

    public function setJoueurDestinataire(?Joueur $JoueurDestinataire): self
    {
        $this->JoueurDestinataire = $JoueurDestinataire;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getLimitDate(): ?\DateTimeInterface
    {
        return $this->limit_date;
    }

    public function setLimitDate(\DateTimeInterface $limit_date): self
    {
        $this->limit_date = $limit_date;

        return $this;
    }

    public function getDateReponse(): ?\DateTimeInterface
    {
        return $this->date_reponse;
    }

    public function setDateReponse(?\DateTimeInterface $date_reponse): self
    {
        $this->date_reponse = $date_reponse;

        return $this;
    }
}
