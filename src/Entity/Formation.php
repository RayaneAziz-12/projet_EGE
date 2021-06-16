<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    use CommonFields;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Bulletins::class, inversedBy="formation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bulletins;

    /**
     * @ORM\OneToMany(targetEntity=Examen::class, mappedBy="formation")
     */
    private $examen;

    /**
     * @ORM\OneToMany(targetEntity=Ue::class, mappedBy="formation")
     */
    private $ue;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="formation")
     */
    private $matieres;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=anneeScolaire::class, inversedBy="formations")
     */
    private $anneeScolaires;

    public function __construct()
    {
        $this->examen = new ArrayCollection();
        $this->ue = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getBulletins(): ?Bulletins
    {
        return $this->bulletins;
    }

    public function setBulletins(?Bulletins $bulletins): self
    {
        $this->bulletins = $bulletins;

        return $this;
    }

    /**
     * @return Collection|Examen[]
     */
    public function getExamen(): Collection
    {
        return $this->examen;
    }

    public function addExaman(Examen $examan): self
    {
        if (!$this->examen->contains($examan)) {
            $this->examen[] = $examan;
            $examan->setFormation($this);
        }

        return $this;
    }

    public function removeExaman(Examen $examan): self
    {
        if ($this->examen->removeElement($examan)) {
            // set the owning side to null (unless already changed)
            if ($examan->getFormation() === $this) {
                $examan->setFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ue[]
     */
    public function getUe(): Collection
    {
        return $this->ue;
    }

    public function addUe(Ue $ue): self
    {
        if (!$this->ue->contains($ue)) {
            $this->ue[] = $ue;
            $ue->setFormation($this);
        }

        return $this;
    }

    public function removeUe(Ue $ue): self
    {
        if ($this->ue->removeElement($ue)) {
            // set the owning side to null (unless already changed)
            if ($ue->getFormation() === $this) {
                $ue->setFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
            $matiere->setFormation($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getFormation() === $this) {
                $matiere->setFormation(null);
            }
        }

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAnneeScolaires(): ?anneeScolaire
    {
        return $this->anneeScolaires;
    }

    public function setAnneeScolaires(?anneeScolaire $anneeScolaires): self
    {
        $this->anneeScolaires = $anneeScolaires;

        return $this;
    }

}
