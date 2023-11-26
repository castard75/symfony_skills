<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
#[UniqueEntity(fields: ['Code'], message: 'Le code doit être unique')]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 1,
        max: 255,
        minMessage: 'Le nom doit être supérieur à 1 caractère',
        maxMessage: 'Le nom ne peut pas dépasser 255 caractères',
    )]  // Manque un assert pour vérifier que le nom n'est pas vide, non blanc et le Type de données // les variables commences par des minuscules et pas par des majuscules // on écrit en anglais et pas en français
    private ?string $Nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(
        min: 5,
        max: 100,
        minMessage: 'Le code doit être supérieur à 5 caractère',
        maxMessage: 'Le code ne peut pas dépasser 100 caractères',
    )]
    #[Assert\Unique] // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?string $Code = null;

    #[ORM\Column] // Manquee un assert pour vérifier le Type de données, manque aussi l'initialisation de la valeur par défaut à false pour la base de données
    private ?bool $Online = false;

    #[ORM\Column] // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?int $SerialNum = null; // il manque la condition! Obligatoire: Conditionnel (si Est en ligne est True)

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)] // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?Realisateur $relation = null; // pourquoi appeler cette propriété relation? ça n'a pas de sens, il faut appeler cette propriété realisateur (mais en anglais)

   

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

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(?string $Code): static // On retourne pas en static mais en self
    {
        $this->Code = $Code;

        return $this;
    }

    public function isOnline(): ?bool
    {
        return $this->Online;
    }

    public function setOnline(bool $Online): static
    {
        $this->Online = $Online;

        return $this;
    }

    public function getSerialNum(): ?int
    {
        return $this->SerialNum;
    }

    public function setSerialNum(int $SerialNum): static // On retourne pas en static mais en self
    {
        $this->SerialNum = $SerialNum;

        return $this;
    }

    public function getRelation(): ?Realisateur
    {
        return $this->relation;
    }

    public function setRelation(?Realisateur $relation): static // On retourne pas en static mais en self
    {
        $this->relation = $relation;

        return $this;
    }


}