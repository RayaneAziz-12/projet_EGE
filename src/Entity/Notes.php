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
}
