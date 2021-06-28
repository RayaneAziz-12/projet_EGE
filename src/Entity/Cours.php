<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
{
    use CommonFields;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $hDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $hFin;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity=EmploiTemps::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $emploiTemps;

    /**
     * @ORM\ManyToOne(targetEntity=Presence::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $presence;

    /**
     * @ORM\ManyToOne(targetEntity=Personnel::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $matiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHDebut(): ?\DateTimeInterface
    {
        return $this->hDebut;
    }

    public function setHDebut(\DateTimeInterface $hDebut): self
    {
        $this->hDebut = $hDebut;

        return $this;
    }

    public function getHFin(): ?\DateTimeInterface
    {
        return $this->hFin;
    }

    public function setHFin(\DateTimeInterface $hFin): self
    {
        $this->hFin = $hFin;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    
    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getEmploiTemps(): ?EmploiTemps
    {
        return $this->emploiTemps;
    }

    public function setEmploiTemps(?EmploiTemps $emploiTemps): self
    {
        $this->emploiTemps = $emploiTemps;

        return $this;
    }

    public function getPresence(): ?Presence
    {
        return $this->presence;
    }

    public function setPresence(?Presence $presence): self
    {
        $this->presence = $presence;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }
}
