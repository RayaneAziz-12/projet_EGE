<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    use CommonFields;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $coeffMat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libMat;

    /**
     * @ORM\Column(type="float")
     */
    private $moyMat;

    /**
     * @ORM\Column(type="time")
     */
    private $nbHeures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $respoMat;

    /**
     * @ORM\ManyToOne(targetEntity=Ue::class, inversedBy="matiere")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ue;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="matiere")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="matieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getCoeffMat(): ?int
    {
        return $this->coeffMat;
    }

    public function setCoeffMat(int $coeffMat): self
    {
        $this->coeffMat = $coeffMat;

        return $this;
    }

    public function getLibMat(): ?string
    {
        return $this->libMat;
    }

    public function setLibMat(string $libMat): self
    {
        $this->libMat = $libMat;

        return $this;
    }

    public function getMoyMat(): ?float
    {
        return $this->moyMat;
    }

    public function setMoyMat(float $moyMat): self
    {
        $this->moyMat = $moyMat;

        return $this;
    }

    public function getNbHeures(): ?\DateTimeInterface
    {
        return $this->nbHeures;
    }

    public function setNbHeures(\DateTimeInterface $nbHeures): self
    {
        $this->nbHeures = $nbHeures;

        return $this;
    }

    public function getRespoMat(): ?string
    {
        return $this->respoMat;
    }

    public function setRespoMat(string $respoMat): self
    {
        $this->respoMat = $respoMat;

        return $this;
    }

    public function getFormationMatiere(): ?Formation
    {
        return $this->formation_matiere;
    }

    public function setFormationMatiere(?Formation $formation_matiere): self
    {
        $this->formation_matiere = $formation_matiere;

        return $this;
    }

    public function getUe(): ?Ue
    {
        return $this->ue;
    }

    public function setUe(?Ue $ue): self
    {
        $this->ue = $ue;

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setMatiere($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getMatiere() === $this) {
                $cour->setMatiere(null);
            }
        }

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
