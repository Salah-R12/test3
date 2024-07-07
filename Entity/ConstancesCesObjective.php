<?php

namespace App\Entity;

use App\Repository\ConstancesCesObjectiveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstancesCesObjectiveRepository::class)]
#[ORM\Table(options: ['comment' => 'Objectifs des CES'])]
#[ORM\Index(name: 'ces_id', columns:['ces_id'])]
#[ORM\Index(name: 'year', columns:['year'])]
class ConstancesCesObjective
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(options: ['comment' => "ID de l'Objectif"])]
    private ?int $id = null;

    #[ORM\Column(nullable: false, options: ['comment' => 'Code CES'])]
    private ?int $cesId = null;

    #[ORM\Column(options: ['comment' => 'Année'])]
    private ?int $year = null;

    #[ORM\Column(options: ['comment' => 'Objectif'])]
    private ?int $objective = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCesId(): ?int
    {
        return $this->cesId;
    }

    public function setCesEntity(int $cesId): static
    {
        $this->cesId = $cesId;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getObjective(): ?int
    {
        return $this->objective;
    }

    public function setObjective(int $objective): static
    {
        $this->objective = $objective;

        return $this;
    }
}
