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
    #[Assert\Type('string')]  
    #[Assert\NotNull]      
    private ?string $name = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(
        min: 5,
        max: 100,
        minMessage: 'Le code doit être supérieur à 5 caractère',
        maxMessage: 'Le code ne peut pas dépasser 100 caractères',
    )]
    #[Assert\Unique]
    #[Assert\Type('string')]
    private ?string $code = null;

    #[ORM\Column (options: ['default' => false])]
    #[Assert\Type('bool')]
    private ?bool $online = false;

    #[ORM\Column( nullable: true)] 
    #[Assert\Type('integer')] 
    #[Assert\Expression(
        "this.isOnline() == true ? (value != null) : true",
        message: 'Le sérial est obligatoire'
    )]
    private ?int $serialNum = null;

    #[ORM\ManyToOne(inversedBy: 'film')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Expression(
        "this.isOnline() == true ? (value != null) : true",
        message: 'obligatoire'
    )]
    #[Assert\Type(Realisateur::class)]
    
    private ?Realisateur $director = null; 


  
   

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

    public function setCode(?string $code): self
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

    public function setSerialNum(int $serialNum): self
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
