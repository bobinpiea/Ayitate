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
}
