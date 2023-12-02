<?php

namespace App\Entity;

use App\Repository\RealisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisateurRepository::class)]
class Realisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Le nom doit être supérieur à 1 caractère',
        maxMessage: 'Le nom ne peut pas dépasser 255 caractères',
    )]
    #[Assert\NotNull]
    #[Assert\Type('string')] 
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)] 
    #[Assert\Type('string')]
    private ?string $country = null;

    #[ORM\OneToMany(mappedBy: 'director', targetEntity: Film::class)]
    private Collection $film;

    public function __construct()
    {
        $this->film = new ArrayCollection();
    }

    


    public function __toString(): string
    {
        return sprintf(
            '%s',
            $this->name,
        );
    }
  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self 
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilm(): Collection
    {
        return $this->film;
    }

    public function addFilm(Film $film): static
    {
        if (!$this->film->contains($film)) {
            $this->film->add($film);
            $film->setDirector($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        if ($this->film->removeElement($film)) {
            
            if ($film->getDirector() === $this) {
                $film->setDirector(null);
            }
        }

        return $this;
    }


}
