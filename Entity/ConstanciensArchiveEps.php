<?php

namespace App\Entity;

use App\Repository\ConstanciensArchiveEpsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensArchiveEpsRepository::class)]
class ConstanciensArchiveEps
{
    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', nullable: false, options: ['default' => 0])]
    private ?Constanciens $constancien = null;

    #[ORM\Id]
    #[ORM\Column(options: ['default' => 0])]
    private ?int $status = 0;

    #[ORM\Column(nullable: true)]
    private ?int $dateEps = null;

    #[ORM\Column(nullable: true)]
    private ?int $updated = null;

    public function getConstancien(): ?Constanciens
    {
        return $this->constancien;
    }

    public function setConstancien(Constanciens $constancien): static
    {
        $this->constancien = $constancien;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDateEps(): ?int
    {
        return $this->dateEps;
    }

    public function setDateEps(?int $dateEps): static
    {
        $this->dateEps = $dateEps;

        return $this;
    }

    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    public function setUpdated(?int $updated): static
    {
        $this->updated = $updated;

        return $this;
    }
}
