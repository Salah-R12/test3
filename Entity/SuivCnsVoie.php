<?php

namespace App\Entity;

use App\Repository\SuivCnsVoieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuivCnsVoieRepository::class)]
class SuivCnsVoie
{
    #[ORM\Id]
    #[ORM\Column(length: 3)]
    private ?string $voiCode = null;

    #[ORM\Column(length: 30)]
    private ?string $voiName = null;

    public function getId(): ?int
    {
        return $this->voiCode;
    }

    public function setVoiCode(string $voiCode): static
    {
        $this->voiCode = $voiCode;

        return $this;
    }

    public function getVoiName(): ?string
    {
        return $this->voiName;
    }

    public function setVoiName(string $voiName): static
    {
        $this->voiName = $voiName;

        return $this;
    }
}
