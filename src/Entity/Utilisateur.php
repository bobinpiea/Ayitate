<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatar = null;

    #[ORM\Column(nullable: true)]
    private ?array $role = null;

    /**
     * @var Collection<int, Blog>
     */
    #[ORM\OneToMany(targetEntity: Blog::class, mappedBy: 'utilisateur')]
    private Collection $blogs;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\ManyToMany(targetEntity: Message::class, inversedBy: 'utilisateurs')]
    private Collection $messagesAvertis;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'utilisateur')]
    private Collection $messages;

    /**
     * @var Collection<int, Sujet>
     */
    #[ORM\OneToMany(targetEntity: Sujet::class, mappedBy: 'utilisateur')]
    private Collection $sujets;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\OneToMany(targetEntity: Categorie::class, mappedBy: 'utilisateur')]
    private Collection $categories;

    /**
     * @var Collection<int, Annonce>
     */
    #[ORM\OneToMany(targetEntity: Annonce::class, mappedBy: 'certifiePar')]
    private Collection $annoncesCertifiees;

    public function __construct()
    {
        $this->blogs = new ArrayCollection();
        $this->messagesAvertis = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->sujets = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->annoncesCertifiees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(?array $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Blog>
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blog $blog): static
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs->add($blog);
            $blog->setUtilisateur($this);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): static
    {
        if ($this->blogs->removeElement($blog)) {
            // set the owning side to null (unless already changed)
            if ($blog->getUtilisateur() === $this) {
                $blog->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessagesAvertis(): Collection
    {
        return $this->messagesAvertis;
    }

    public function addMessagesAverti(Message $messagesAverti): static
    {
        if (!$this->messagesAvertis->contains($messagesAverti)) {
            $this->messagesAvertis->add($messagesAverti);
        }

        return $this;
    }

    public function removeMessagesAverti(Message $messagesAverti): static
    {
        $this->messagesAvertis->removeElement($messagesAverti);

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setUtilisateur($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getUtilisateur() === $this) {
                $message->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sujet>
     */
    public function getSujets(): Collection
    {
        return $this->sujets;
    }

    public function addSujet(Sujet $sujet): static
    {
        if (!$this->sujets->contains($sujet)) {
            $this->sujets->add($sujet);
            $sujet->setUtilisateur($this);
        }

        return $this;
    }

    public function removeSujet(Sujet $sujet): static
    {
        if ($this->sujets->removeElement($sujet)) {
            // set the owning side to null (unless already changed)
            if ($sujet->getUtilisateur() === $this) {
                $sujet->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getUtilisateur() === $this) {
                $category->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnoncesCertifiees(): Collection
    {
        return $this->annoncesCertifiees;
    }

    public function addAnnoncesCertifiee(Annonce $annoncesCertifiee): static
    {
        if (!$this->annoncesCertifiees->contains($annoncesCertifiee)) {
            $this->annoncesCertifiees->add($annoncesCertifiee);
            $annoncesCertifiee->setCertifiePar($this);
        }

        return $this;
    }

    public function removeAnnoncesCertifiee(Annonce $annoncesCertifiee): static
    {
        if ($this->annoncesCertifiees->removeElement($annoncesCertifiee)) {
            // set the owning side to null (unless already changed)
            if ($annoncesCertifiee->getCertifiePar() === $this) {
                $annoncesCertifiee->setCertifiePar(null);
            }
        }

        return $this;
    }
}
