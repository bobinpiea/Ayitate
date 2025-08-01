<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $reference = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?\DateTime $datePublication = null;

    #[ORM\Column(length: 50)]
    private ?string $commune = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $quartier = null;

    #[ORM\Column(nullable: true)]
    private ?int $superficie = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ascenseur = null;

    #[ORM\Column(nullable: true)]
    private ?bool $cuisine = null;

    #[ORM\Column(nullable: true)]
    private ?bool $terasse = null;

    #[ORM\Column(nullable: true)]
    private ?bool $wc = null;

    #[ORM\Column(nullable: true)]
    private ?bool $climatiseur = null;

    #[ORM\Column(nullable: true)]
    private ?int $anneeConstruction = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbChambres = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPieces = null;

    #[ORM\Column(nullable: true)]
    private ?int $surfaceHabitable = null;

    #[ORM\Column(nullable: true)]
    private ?bool $salleBain = null;

    #[ORM\Column(nullable: true)]
    private ?bool $balcon = null;

    #[ORM\Column(nullable: true)]
    private ?int $charges = null;

    #[ORM\Column(nullable: true)]
    private ?bool $parking = null;

    #[ORM\Column(nullable: true)]
    private ?bool $garage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $constructible = null;

    #[ORM\Column(nullable: true)]
    private ?bool $viabilise = null;

    #[ORM\Column(nullable: true)]
    private ?bool $pmr = null;

    #[ORM\Column(nullable: true)]
    private ?bool $jardin = null;

    #[ORM\Column(nullable: true)]
    private ?bool $piscine = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbColocataires = null;

    #[ORM\Column(nullable: true)]
    private ?bool $apatam = null;

    #[ORM\Column(nullable: true)]
    private ?int $dureeContrat = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateFin = null;

    #[ORM\Column(nullable: true)]
    private ?bool $salon = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NatureBien $natureBien = null;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\ManyToMany(targetEntity: Document::class, inversedBy: 'annonces')]
    private Collection $documents;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'annonce')]
    private Collection $photos;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Transaction $transaction = null;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDatePublication(): ?\DateTime
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTime $datePublication): static
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(?string $quartier): static
    {
        $this->quartier = $quartier;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(?int $superficie): static
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    public function isAscenseur(): ?bool
    {
        return $this->ascenseur;
    }

    public function setAscenseur(?bool $ascenseur): static
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    public function isCuisine(): ?bool
    {
        return $this->cuisine;
    }

    public function setCuisine(?bool $cuisine): static
    {
        $this->cuisine = $cuisine;

        return $this;
    }

    public function isTerasse(): ?bool
    {
        return $this->terasse;
    }

    public function setTerasse(?bool $terasse): static
    {
        $this->terasse = $terasse;

        return $this;
    }

    public function isWc(): ?bool
    {
        return $this->wc;
    }

    public function setWc(?bool $wc): static
    {
        $this->wc = $wc;

        return $this;
    }

    public function isClimatiseur(): ?bool
    {
        return $this->climatiseur;
    }

    public function setClimatiseur(?bool $climatiseur): static
    {
        $this->climatiseur = $climatiseur;

        return $this;
    }

    public function getAnneeConstruction(): ?int
    {
        return $this->anneeConstruction;
    }

    public function setAnneeConstruction(?int $anneeConstruction): static
    {
        $this->anneeConstruction = $anneeConstruction;

        return $this;
    }

    public function getNbChambres(): ?int
    {
        return $this->nbChambres;
    }

    public function setNbChambres(?int $nbChambres): static
    {
        $this->nbChambres = $nbChambres;

        return $this;
    }

    public function getNbPieces(): ?int
    {
        return $this->nbPieces;
    }

    public function setNbPieces(?int $nbPieces): static
    {
        $this->nbPieces = $nbPieces;

        return $this;
    }

    public function getSurfaceHabitable(): ?int
    {
        return $this->surfaceHabitable;
    }

    public function setSurfaceHabitable(?int $surfaceHabitable): static
    {
        $this->surfaceHabitable = $surfaceHabitable;

        return $this;
    }

    public function isSalleBain(): ?bool
    {
        return $this->salleBain;
    }

    public function setSalleBain(?bool $salleBain): static
    {
        $this->salleBain = $salleBain;

        return $this;
    }

    public function isBalcon(): ?bool
    {
        return $this->balcon;
    }

    public function setBalcon(?bool $balcon): static
    {
        $this->balcon = $balcon;

        return $this;
    }

    public function getCharges(): ?int
    {
        return $this->charges;
    }

    public function setCharges(?int $charges): static
    {
        $this->charges = $charges;

        return $this;
    }

    public function isParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(?bool $parking): static
    {
        $this->parking = $parking;

        return $this;
    }

    public function isGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(?bool $garage): static
    {
        $this->garage = $garage;

        return $this;
    }

    public function isConstructible(): ?bool
    {
        return $this->constructible;
    }

    public function setConstructible(?bool $constructible): static
    {
        $this->constructible = $constructible;

        return $this;
    }

    public function isViabilise(): ?bool
    {
        return $this->viabilise;
    }

    public function setViabilise(?bool $viabilise): static
    {
        $this->viabilise = $viabilise;

        return $this;
    }

    public function isPmr(): ?bool
    {
        return $this->pmr;
    }

    public function setPmr(?bool $pmr): static
    {
        $this->pmr = $pmr;

        return $this;
    }

    public function isJardin(): ?bool
    {
        return $this->jardin;
    }

    public function setJardin(?bool $jardin): static
    {
        $this->jardin = $jardin;

        return $this;
    }

    public function isPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(?bool $piscine): static
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function getNbColocataires(): ?int
    {
        return $this->nbColocataires;
    }

    public function setNbColocataires(?int $nbColocataires): static
    {
        $this->nbColocataires = $nbColocataires;

        return $this;
    }

    public function isApatam(): ?bool
    {
        return $this->apatam;
    }

    public function setApatam(?bool $apatam): static
    {
        $this->apatam = $apatam;

        return $this;
    }

    public function getDureeContrat(): ?int
    {
        return $this->dureeContrat;
    }

    public function setDureeContrat(?int $dureeContrat): static
    {
        $this->dureeContrat = $dureeContrat;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function isSalon(): ?bool
    {
        return $this->salon;
    }

    public function setSalon(?bool $salon): static
    {
        $this->salon = $salon;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNatureBien(): ?NatureBien
    {
        return $this->natureBien;
    }

    public function setNatureBien(?NatureBien $natureBien): static
    {
        $this->natureBien = $natureBien;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        $this->documents->removeElement($document);

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setAnnonce($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getAnnonce() === $this) {
                $photo->setAnnonce(null);
            }
        }

        return $this;
    }

    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    public function setTransaction(?Transaction $transaction): static
    {
        $this->transaction = $transaction;

        return $this;
    }
}
