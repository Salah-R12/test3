<?php

namespace App\Entity;

use App\Repository\SuivCnsCommunesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuivCnsCommunesRepository::class)]
class SuivCnsCommunes
{
    #[ORM\Id]
    #[ORM\Column(length: 5)]
    private ?string $comCp = null;

    #[ORM\Id]
    #[ORM\Column(length: 5)]
    private ?string $comInsee = null;

    #[ORM\Column(length: 50)]
    private ?string $comNom = null;

    #[ORM\Column(length: 3)]
    private ?string $comDpt = null;


    #[ORM\Column(length: 100, nullable: true)]
    private ?string $continent = null;

    public function getComCp(): ?string
    {
        return $this->comCp;
    }

    public function setComCp(string $comCp): static
    {
        $this->comCp = $comCp;

        return $this;
    }

    public function getComInsee(): ?string
    {
        return $this->comInsee;
    }

    public function setComInsee(string $comInsee): static
    {
        $this->comInsee = $comInsee;

        return $this;
    }

    public function getComDpt(): ?string
    {
        return $this->comDpt;
    }

    public function setComDpt(string $comDpt): static
    {
        $this->comDpt = $comDpt;

        return $this;
    }

    public function getComNom(): ?string
    {
        return $this->comNom;
    }

    public function setComNom(string $comNom): static
    {
        $this->comNom = $comNom;

        return $this;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(?string $continent): static
    {
        $this->continent = $continent;

        return $this;
    }
}
