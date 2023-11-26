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
    )] // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)] // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?string $Pays = null;

    // ou se trouve la relation inverse de Film ?? il faut la créer

    public function __toString(): string
    {
        return sprintf(
            '%s',
            $this->Nom,
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

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(?string $Pays): static
    {
        $this->Pays = $Pays;

        return $this;
    }


}
