<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Traits\CommonFields;
use App\Entity\Traits\UserCommonFields;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Etudiant
{
    use CommonFields;


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     
     */
    private $id;
    

    /**
     * @ORM\ManyToOne(targetEntity=Presence::class, inversedBy="etudiant")
     * @ORM\JoinColumn(nullable=true)
     */
    private $presence;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Notes::class, mappedBy="etudiant")

     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=Bulletins::class, mappedBy="etudiant")

     */
    private $bulletins;


    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sexe;

    /**
     * @ORM\ManyToMany(targetEntity=AnneeScolaireFormation::class, inversedBy="etudiants")
     */
    private $Formations;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->bulletins = new ArrayCollection();
        $this->Formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

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
            $note->setEtudiant($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEtudiant() === $this) {
                $note->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bulletins[]
     */
    public function getBulletins(): Collection
    {
        return $this->bulletins;
    }

    public function addBulletin(Bulletins $bulletin): self
    {
        if (!$this->bulletins->contains($bulletin)) {
            $this->bulletins[] = $bulletin;
            $bulletin->setEtudiant($this);
        }

        return $this;
    }

    public function removeBulletin(Bulletins $bulletin): self
    {
        if ($this->bulletins->removeElement($bulletin)) {
            // set the owning side to null (unless already changed)
            if ($bulletin->getEtudiant() === $this) {
                $bulletin->setEtudiant(null);
            }
        }

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return Collection|AnneeScolaireFormation[]
     */
    public function getFormations(): Collection
    {
        return $this->Formations;
    }

    public function addFormation(AnneeScolaireFormation $formation): self
    {
        if (!$this->Formations->contains($formation)) {
            $this->Formations[] = $formation;
        }

        return $this;
    }

    public function removeFormation(AnneeScolaireFormation $formation): self
    {
        $this->Formations->removeElement($formation);

        return $this;
    }
}
