<?php

namespace App\Entity;

use App\Repository\SuivCnsAdresseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuivCnsAdresseRepository::class)]
class SuivCnsAdresse
{
    #[ORM\Id]
    #[ORM\Column(name: 'NConstances',length: 8)]
    private ?string $NConstances = null;

    #[ORM\Id]
    #[ORM\Column(name:'NewAdresDtCreat', type: Types::DATETIME_MUTABLE, options: ['default' => 'CURRENT_TIMESTAMP', 'extra' => 'DEFAULT_GENERATED'])]
    private ?\DateTimeInterface $newAdresDtCreat = null;

    #[ORM\Column(name:'NewAdresNum', length: 10, nullable: true)]
    private ?string $newAdresNum = null;

    #[ORM\Column(name:'NewAdresTypeVoie', length: 30, nullable: true)]
    private ?string $newAdresTypeVoie = null;

    #[ORM\Column(name:'NewAdresNomVoie', length: 38, nullable: true)]
    private ?string $newAdresNomVoie = null;

    #[ORM\Column(name:'NewAdresCplt', length: 38, nullable: true)]
    private ?string $newAdresCplt = null;

    #[ORM\Column(name:'newAdresCP', length: 5)]
    private ?string $newAdresCP = null;

    #[ORM\Column(name:'NewAdresCommune', length: 38)]
    private ?string $newAdresCommune = null;

    #[ORM\Column(name:'NewAdresPays', length: 38)]
    private ?string $newAdresPays = null;

    #[ORM\Column(name:'NewAdresCplt2', length: 38, nullable: true)]
    private ?string $newAdresCplt2 = null;

    #[ORM\Column(name:'NewAdresBD', length: 38)]
    private ?string $newAdresBD = null;

    public function getNConstances(): ?string
    {
        return $this->NConstances;
    }

    public function setNConstances(string $NConstances): static
    {
        $this->NConstances = $NConstances;

        return $this;
    }

    public function getNewAdresDtCreat(): ?\DateTimeInterface
    {
        return $this->newAdresDtCreat;
    }

    public function setNewAdresDtCreat(\DateTimeInterface $newAdresDtCreat): static
    {
        $this->newAdresDtCreat = $newAdresDtCreat;

        return $this;
    }

    public function getNewAdresNum(): ?string
    {
        return $this->newAdresNum;
    }

    public function setNewAdresNum(?string $newAdresNum): static
    {
        $this->newAdresNum = $newAdresNum;

        return $this;
    }

    public function getNewAdresTypeVoie(): ?string
    {
        return $this->newAdresTypeVoie;
    }

    public function setNewAdresTypeVoie(?string $newAdresTypeVoie): static
    {
        $this->newAdresTypeVoie = $newAdresTypeVoie;

        return $this;
    }

    public function getNewAdresNomVoie(): ?string
    {
        return $this->newAdresNomVoie;
    }

    public function setNewAdresNomVoie(?string $newAdresNomVoie): static
    {
        $this->newAdresNomVoie = $newAdresNomVoie;

        return $this;
    }

    public function getNewAdresCplt(): ?string
    {
        return $this->newAdresCplt;
    }

    public function setNewAdresCplt(?string $newAdresCplt): static
    {
        $this->newAdresCplt = $newAdresCplt;

        return $this;
    }

    public function getNewAdresCP(): ?string
    {
        return $this->newAdresCP;
    }

    public function setNewAdresCP(string $newAdresCP): static
    {
        $this->newAdresCP = $newAdresCP;

        return $this;
    }

    public function getNewAdresCommune(): ?string
    {
        return $this->newAdresCommune;
    }

    public function setNewAdresCommune(string $newAdresCommune): static
    {
        $this->newAdresCommune = $newAdresCommune;

        return $this;
    }

    public function getNewAdresPays(): ?string
    {
        return $this->newAdresPays;
    }

    public function setNewAdresPays(string $newAdresPays): static
    {
        $this->newAdresPays = $newAdresPays;

        return $this;
    }

    public function getNewAdresCplt2(): ?string
    {
        return $this->newAdresCplt2;
    }

    public function setNewAdresCplt2(?string $newAdresCplt2): static
    {
        $this->newAdresCplt2 = $newAdresCplt2;

        return $this;
    }

    public function getNewAdresBD(): ?string
    {
        return $this->newAdresBD;
    }

    public function setNewAdresBD(string $newAdresBD): static
    {
        $this->newAdresBD = $newAdresBD;

        return $this;
    }
}
