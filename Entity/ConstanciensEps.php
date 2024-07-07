<?php

namespace App\Entity;

use App\Repository\ConstanciensEpsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensEpsRepository::class)]
class ConstanciensEps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'eps_id')]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', options: ['default' => 0], nullable: false)]
    private ?Constanciens $constancien = null;

    #[ORM\Column(options: ['default' => 0])]
    private ?int $convocDate = 0;

    #[ORM\Column(nullable: true)]
    private ?int $startDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $endDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $choice = null;

    #[ORM\Column(options: ['default' => 0, 'comment' => '1 = EPS1 and 2 = EPS2'])]
    private ?int $type = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConstancien(): ?Constanciens
    {
        return $this->constancien;
    }

    public function setConstancien(Constanciens $constancien): static
    {
        $this->constancien = $constancien;

        return $this;
    }

    public function getConvocDate(): ?int
    {
        return $this->convocDate;
    }

    public function setConvocDate(int $convocDate): static
    {
        $this->convocDate = $convocDate;

        return $this;
    }

    public function getStartDate(): ?int
    {
        return $this->startDate;
    }

    public function setStartDate(?int $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?int
    {
        return $this->endDate;
    }

    public function setEndDate(?int $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getChoice(): ?int
    {
        return $this->choice;
    }

    public function setChoice(?int $choice): static
    {
        $this->choice = $choice;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }
}
