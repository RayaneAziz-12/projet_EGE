<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 */
class Salle
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
    private $respoSalle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutSalle;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="salle")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=Batiment::class, inversedBy="salle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $batiment;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRespoSalle(): ?string
    {
        return $this->respoSalle;
    }

    public function setRespoSalle(string $respoSalle): self
    {
        $this->respoSalle = $respoSalle;

        return $this;
    }

    public function getStatutSalle(): ?string
    {
        return $this->statutSalle;
    }

    public function setStatutSalle(string $statutSalle): self
    {
        $this->statutSalle = $statutSalle;

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
            $cour->setSalle($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getSalle() === $this) {
                $cour->setSalle(null);
            }
        }

        return $this;
    }

    public function getBatiment(): ?Batiment
    {
        return $this->batiment;
    }

    public function setBatiment(?Batiment $batiment): self
    {
        $this->batiment = $batiment;

        return $this;
    }
}
