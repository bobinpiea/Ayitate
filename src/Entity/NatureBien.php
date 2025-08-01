<?php

namespace App\Entity;

use App\Repository\NatureBienRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NatureBienRepository::class)]
class NatureBien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $typeBien = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeBien(): ?string
    {
        return $this->typeBien;
    }

    public function setTypeBien(string $typeBien): static
    {
        $this->typeBien = $typeBien;

        return $this;
    }
}
