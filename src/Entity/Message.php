<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateCreation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sujet $sujet = null;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'messagesAvertis')]
    private Collection $avertisseurs;

    public function __construct()
    {
        $this->avertisseurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTime $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getSujet(): ?Sujet
    {
        return $this->sujet;
    }

    public function setSujet(?Sujet $sujet): static
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getAvertisseurs(): Collection
    {
        return $this->avertisseurs;
    }

    public function addAvertisseur(Utilisateur $avertisseur): static
    {
        if (!$this->avertisseurs->contains($avertisseur)) {
            $this->avertisseurs->add($avertisseur);
            $avertisseur->addMessagesAverti($this);
        }

        return $this;
    }

    public function removeAvertisseur(Utilisateur $avertisseur): static
    {
        if ($this->avertisseurs->removeElement($avertisseur)) {
            $avertisseur->removeMessagesAverti($this);
        }

        return $this;
    }
}
