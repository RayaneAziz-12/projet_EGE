<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnneeScolaireStatutRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnneeScolaireStatutRepository::class)
 */
class AnneeScolaireStatut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $statutName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $statutDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatutName(): ?string
    {
        return $this->statutName;
    }

    public function setStatutName(string $statutName): self
    {
        $this->statutName = $statutName;

        return $this;
    }

    public function getStatutDescription(): ?string
    {
        return $this->statutDescription;
    }

    public function setStatutDescription(?string $statutDescription): self
    {
        $this->statutDescription = $statutDescription;

        return $this;
    }
}
