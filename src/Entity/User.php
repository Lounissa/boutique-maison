<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    //====================propriétes ======================//
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse2 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $pays = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tel = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Avatar $avatar = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Favori::class, orphanRemoval: true)]
    private Collection $favoris;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secretIv = null;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Adresse::class)]
    private Collection $adresses;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Commande $commande = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Panier $panier = null;

    public function __construct()
    {
        $this->favoris = new ArrayCollection();
        $this->adresses = new ArrayCollection();
    }

    //=======================getters/setters=============//

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(?string $adresse1): static
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): static
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): static
    {
        $this->codePostal = $codePostal;

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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getAvatar(): ?Avatar
    {
        return $this->avatar;
    }

    public function setAvatar(Avatar $avatar): static
    {
        // set the owning side of the relation if necessary
        if ($avatar->getUser() !== $this) {
            $avatar->setUser($this);
        }

        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Collection<int, Favori>
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Favori $favori): static
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris->add($favori);
            $favori->setUser($this);
        }

        return $this;
    }

    public function removeFavori(Favori $favori): static
    {
        if ($this->favoris->removeElement($favori)) {
            // set the owning side to null (unless already changed)
            if ($favori->getUser() === $this) {
                $favori->setUser(null);
            }
        }

        return $this;
    }

    public function getSecretIv(): ?string
    {
        return $this->secretIv;
    }

    public function setSecretIv(?string $secretIv): static
    {
        $this->secretIv = $secretIv;

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adresse $adress): static
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses->add($adress);
            $adress->setUsers($this);
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): static
    {
        if ($this->adresses->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getUsers() === $this) {
                $adress->setUsers(null);
            }
        }

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        // unset the owning side of the relation if necessary
        if ($commande === null && $this->commande !== null) {
            $this->commande->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($commande !== null && $commande->getUser() !== $this) {
            $commande->setUser($this);
        }

        $this->commande = $commande;

        return $this;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): static
    {
        // unset the owning side of the relation if necessary
        if ($panier === null && $this->panier !== null) {
            $this->panier->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($panier !== null && $panier->getUser() !== $this) {
            $panier->setUser($this);
        }

        $this->panier = $panier;

        return $this;
    }
}
