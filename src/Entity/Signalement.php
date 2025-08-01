<?php

namespace App\Entity;

use App\Repository\SignalementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SignalementRepository::class)]
class Signalement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateSignalement = null;

    #[ORM\Column(length: 100)]
    private ?string $typeSignalement = null;

    #[ORM\ManyToOne(inversedBy: 'signalements')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'signalements')]
    private ?Annonce $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSignalement(): ?\DateTime
    {
        return $this->dateSignalement;
    }

    public function setDateSignalement(\DateTime $dateSignalement): static
    {
        $this->dateSignalement = $dateSignalement;

        return $this;
    }

    public function getTypeSignalement(): ?string
    {
        return $this->typeSignalement;
    }

    public function setTypeSignalement(string $typeSignalement): static
    {
        $this->typeSignalement = $typeSignalement;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): static
    {
        $this->annonce = $annonce;

        return $this;
    }
}
