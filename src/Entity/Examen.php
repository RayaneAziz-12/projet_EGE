<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExamenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ExamenRepository::class)
 */
class Examen
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
    private $intituleExam;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="examen")
     * @ORM\JoinColumn(nullable=true)
     */
    private $formation;

    /**
     * @ORM\OneToMany(targetEntity=Notes::class, mappedBy="examen")
     */
    private $notes;

    public function __construct()
    {
        $this->idNotes = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdExamen(): ?string
    {
        return $this->idExamen;
    }

    public function setIdExamen(string $idExamen): self
    {
        $this->idExamen = $idExamen;

        return $this;
    }

    public function getIntituleExam(): ?string
    {
        return $this->intituleExam;
    }

    public function setIntituleExam(string $intituleExam): self
    {
        $this->intituleExam = $intituleExam;

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

    /**
     * @return Collection|Notes[]
     */
    public function getIdNotes(): Collection
    {
        return $this->idNotes;
    }

    public function addIdNote(Notes $idNote): self
    {
        if (!$this->idNotes->contains($idNote)) {
            $this->idNotes[] = $idNote;
            $idNote->setExamen($this);
        }

        return $this;
    }

    public function removeIdNote(Notes $idNote): self
    {
        if ($this->idNotes->removeElement($idNote)) {
            // set the owning side to null (unless already changed)
            if ($idNote->getExamen() === $this) {
                $idNote->setExamen(null);
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

    /**
     * @return Collection|Notes[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Notes $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setExamen($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getExamen() === $this) {
                $note->setExamen(null);
            }
        }

        return $this;
    }
}
