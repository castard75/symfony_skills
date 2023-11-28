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
    #[Assert\Type('string')]  // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)] 
    #[Assert\Type('string')] // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?string $country = null;

    #[ORM\OneToMany(mappedBy: 'director', targetEntity: Film::class)]
    private Collection $film;

    // ou se trouve la relation inverse de Film ?? il faut la créer

    public function __toString(): string
    {
        return sprintf(
            '%s',
            $this->name,
        );
    }
    public function __construct()
    {
        $this->films = new ArrayCollection();
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self // On retourne pas en static mais en self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self // On retourne pas en static mais en self
    {
        $this->country = $country;

        return $this;
    }


}
