<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NotesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CommonFields;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NotesRepository::class)
 */
class Notes
{
    use CommonFields;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Bulletins::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bulletins;

    /**
     * @ORM\ManyToOne(targetEntity=Examen::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $examen;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\Column(type="float")
     */
    private $interro1;

    /**
     * @ORM\Column(type="float")
     */
    private $interro2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $interro3;

    /**
     * @ORM\Column(type="float")
     */
    private $Devoir1;

    /**
     * @ORM\Column(type="float")
     */
    private $Devoir2;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getExamen(): ?Examen
    {
        return $this->examen;
    }

    public function setExamen(?Examen $examen): self
    {
        $this->examen = $examen;

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

    public function getInterro1(): ?float
    {
        return $this->interro1;
    }

    public function setInterro1(float $interro1): self
    {
        $this->interro1 = $interro1;

        return $this;
    }

    public function getInterro2(): ?float
    {
        return $this->interro2;
    }

    public function setInterro2(float $interro2): self
    {
        $this->interro2 = $interro2;

        return $this;
    }

    public function getInterro3(): ?float
    {
        return $this->interro3;
    }

    public function setInterro3(?float $interro3): self
    {
        $this->interro3 = $interro3;

        return $this;
    }

    public function getDevoir1(): ?float
    {
        return $this->Devoir1;
    }

    public function setDevoir1(float $Devoir1): self
    {
        $this->Devoir1 = $Devoir1;

        return $this;
    }

    public function getDevoir2(): ?float
    {
        return $this->Devoir2;
    }

    public function setDevoir2(float $Devoir2): self
    {
        $this->Devoir2 = $Devoir2;

        return $this;
    }
}
