<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PersonnelRepository::class)
 */
class Personnel
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
    private $poste;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="personnel")
     */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity=AnneeScolaireFormation::class, mappedBy="responsable")
     */
    private $formations;

     
    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

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
            $cour->setPersonnel($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getPersonnel() === $this) {
                $cour->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnneeScolaireFormation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(AnneeScolaireFormation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setResponsable($this);
        }

        return $this;
    }

    public function removeFormation(AnneeScolaireFormation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getResponsable() === $this) {
                $formation->setResponsable(null);
            }
        }

        return $this;
    }
}
