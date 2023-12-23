<?php


namespace App\DTO;

use App\Entity\Genre;
use App\Entity\Realisateur;
use Symfony\Component\Validator\Constraints as Assert;


class FilmDTO {
    

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $code;
    
     /**
     * @var bool|null
     */
    private $online;

     /**
     * @var int|null
     */
   private $serialNum;
    
  
    /**
     * @var Realisateur|null
     */
    private $director;

        /**
     * @var Genre|null
     */
    private $genre;


  

 
    /**
     * @return Realisateur|null
     */

    public function getDirector(): ?Realisateur
    {
        return $this->director;
    }

     /**
     * @param Realisateur $realisateur
     * @return FilmDTO
     */
    public function setDirector(?Realisateur $director): self
    {
        $this->director = $director;

        return $this;
    }

    
    /**
     * @return Genre|null
     */
    public function getGenre(): ?Genre
    {
        return $this->genre;
    }
    
    /**
     * @param Genre $genre
     * @return FilmDTO
     */
    public function setGenre(Genre $genre): self
    {
        $this->genre = $genre;
        return $this;
    }
    
  /**
     * @return string|null
     */
    public function getName() : ?string {

        return $this->name;

    }

        /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode() : ?string {

        return $this->code;

    }

        /**
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOnline() : ?bool {

        return $this->online;

    }

    /**
     * @param bool $online
     * @return self
     */
    public function setOnline(bool $online): self
    {
        $this->online = $online;
        return $this;
    }

    
    /**
     * @return int|null
     */
    public function getSerialNum() : ?int {

        return $this->serialNum;

    }

    /**
     * @param int $serialNum
     * @return self
     */
    public function setSerialNum(int $serialNum): self
    {
        $this->serialNum = $serialNum;
        return $this;
    }

}