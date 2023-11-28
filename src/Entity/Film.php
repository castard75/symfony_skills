<?php

namespace App\Entity;
use App\Entity\Realisateur;
use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
#[UniqueEntity(fields: ['code'], message: 'Le code doit être unique')]
class Film
{
public function __construct(){
    $this->online = false;
}

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
    )] 
    #[Assert\NotBlank] 
    #[Assert\Type('string')]                        // Manque un assert pour vérifier que le nom n'est pas vide, non blanc et le Type de données // les variables commences par des minuscules et pas par des majuscules // on écrit en anglais et pas en français
    private ?string $name = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(
        min: 5,
        max: 100,
        minMessage: 'Le code doit être supérieur à 5 caractère',
        maxMessage: 'Le code ne peut pas dépasser 100 caractères',
    )]
    #[Assert\Unique]
    #[Assert\Type('string')]               // Manque un assert pour vérifier le Type de données // les variables commences par des minuscules et pas par des majuscules  // on écrit en anglais et pas en français
    private ?string $code = null;

    #[ORM\Column]
    #[Assert\Type('bool')] // Manquee un assert pour vérifier le Type de données, manque aussi l'initialisation de la valeur par défaut à false pour la base de données
    private ?bool $online = false;

    #[ORM\Column] 
    #[Assert\Type('integer')]
    private ?int $serialNum = null;

    #[ORM\ManyToOne]
    private ?Realisateur $director = null; // il manque la condition! Obligatoire: Conditionnel (si Est en ligne est True)


  
   

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self // On retourne pas en static mais en self
    {
        $this->code = $code;

        return $this;
    }

    public function isOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getSerialNum(): ?int
    {
        return $this->serialNum;
    }

    public function setSerialNum(int $serialNum): self // On retourne pas en static mais en self
    {
        $this->serialNum = $serialNum;

        return $this;
    }

    public function getDirector(): ?Realisateur
    {
        return $this->director;
    }

    public function setDirector(?Realisateur $director): static
    {
        $this->director = $director;

        return $this;
    }

 
 




}
