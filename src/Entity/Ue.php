<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UeRepository::class)
 */
class Ue
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
    private $nomUe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $respoUe;

    /**
     * @ORM\Column(type="float")
     */
    private $moyUe;

    /**
     * @ORM\Column(type="integer")
     */
    private $coeffUe;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="ue")
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="ue")
     * @ORM\JoinColumn(nullable=true)
     */
    private $formation;

    public function __construct()
    {
        $this->matiere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUe(): ?string
    {
        return $this->nomUe;
    }

    public function setNomUe(string $nomUe): self
    {
        $this->nomUe = $nomUe;

        return $this;
    }

    public function getRespoUe(): ?string
    {
        return $this->respoUe;
    }

    public function setRespoUe(string $respoUe): self
    {
        $this->respoUe = $respoUe;

        return $this;
    }

    public function getMoyUe(): ?float
    {
        return $this->moyUe;
    }

    public function setMoyUe(float $moyUe): self
    {
        $this->moyUe = $moyUe;

        return $this;
    }

    public function getCoeffUe(): ?int
    {
        return $this->coeffUe;
    }

    public function setCoeffUe(int $coeffUe): self
    {
        $this->coeffUe = $coeffUe;

        return $this;
    }

    public function getIdmatiere(): ?int
    {
        return $this->idmatiere;
    }

    public function setIdmatiere(int $idmatiere): self
    {
        $this->idmatiere = $idmatiere;

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatiere(): Collection
    {
        return $this->matiere;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matiere->contains($matiere)) {
            $this->matiere[] = $matiere;
            $matiere->setUe($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matiere->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getUe() === $this) {
                $matiere->setUe(null);
            }
        }

        return $this;
    }

    public function getIdFormation(): ?Formation
    {
        return $this->idFormation;
    }

    public function setIdFormation(?Formation $idFormation): self
    {
        $this->idFormation = $idFormation;

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
