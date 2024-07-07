<?php

namespace App\Entity;

use App\Repository\PrintDemandConstancesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrintDemandConstancesRepository::class)]
#[ORM\Index(name: 'index_constance', columns: ['constancien_id'])]
#[ORM\Index(name: 'index_demand', columns: ['demand_id'])]
#[ORM\Index(name: 'status', columns: ['status'])]
class PrintDemandConstances
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", nullable: false)]
    private ?PrintDemand $demand = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', nullable: false)]
    private ?Constanciens $constancien = null;

    #[ORM\Column(nullable: true)]
    private ?int $status = null;

    #[ORM\Column(options: ['default' => 0, 'comment' => 'The Unix timestamp when the demand was updated.'])]
    private ?int $updated = 0;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cancel_reason = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemand(): ?PrintDemand
    {
        return $this->demand;
    }

    public function setDemand(PrintDemand $demand): static
    {
        $this->demand = $demand;

        return $this;
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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    public function setUpdated(int $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    public function getCancelReason(): ?string
    {
        return $this->cancel_reason;
    }

    public function setCancelReason(?string $cancel_reason): static
    {
        $this->cancel_reason = $cancel_reason;

        return $this;
    }
}
