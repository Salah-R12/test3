<?php

namespace App\Entity;

use App\Repository\ConstanciensProjetsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensProjetsRepository::class)]
class ConstanciensProjets
{
    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', options:['comment' => "Numéro Constances"])]
    private ?Constanciens $constancien = null;

    #[ORM\Id]
    #[ORM\Column(options:['default' => 0])]
    private ?int $projectId = 0;

    public function getConstancien(): ?Constanciens
    {
        return $this->constancien;
    }

    public function setConstancien(Constanciens $constancien): static
    {
        $this->constancien = $constancien;

        return $this;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId): static
    {
        $this->projectId = $projectId;

        return $this;
    }
}
