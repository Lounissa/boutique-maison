<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ApiResource]
#[Vich\Uploadable]
class Commande
{
    //==================== propriétés ===============//
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $produit = null;

    #[ORM\Column(nullable: true)]
    private ?float $total = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $envoyer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reçu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $payer = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Article::class)]
    private Collection $article;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Produit::class)]
    private Collection $produits;

    #[ORM\OneToOne(inversedBy: 'commande', cascade: ['persist', 'remove'])]
    private ?User $user = null;


    //====================constructeur =========================//

    public function __construct()
    {
        $this->article = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }
    
    //===================getters/setters====================//
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(?string $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getEnvoyer(): ?int
    {
        return $this->envoyer;
    }

    public function setEnvoyer(?int $envoyer): static
    {
        $this->envoyer = $envoyer;

        return $this;
    }

    public function getReçu(): ?int
    {
        return $this->reçu;
    }

    public function setReçu(?int $reçu): static
    {
        $this->reçu = $reçu;

        return $this;
    }

    public function getPayer(): ?string
    {
        return $this->payer;
    }

    public function setPayer(string $payer): static
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->article->contains($article)) {
            $this->article->add($article);
            $article->setCommande($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getCommande() === $this) {
                $article->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setCommande($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCommande() === $this) {
                $produit->setCommande(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
