<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $nickname = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 10, unique: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'artists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ArtisteCategory $artistCategory = null;

    /**
     * @var Collection<int, Bar>
     */
    #[ORM\ManyToMany(targetEntity: Bar::class, inversedBy: 'artists')]
    private Collection $bar;

    public function __construct()
    {
        $this->bar = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

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

    public function getArtistCategory(): ?ArtisteCategory
    {
        return $this->artistCategory;
    }

    public function setArtistCategory(?ArtisteCategory $artistCategory): static
    {
        $this->artistCategory = $artistCategory;

        return $this;
    }

    /**
     * @return Collection<int, Bar>
     */
    public function getBar(): Collection
    {
        return $this->bar;
    }

    public function addBar(Bar $bar): static
    {
        if (!$this->bar->contains($bar)) {
            $this->bar->add($bar);
        }

        return $this;
    }

    public function removeBar(Bar $bar): static
    {
        $this->bar->removeElement($bar);

        return $this;
    }
}
