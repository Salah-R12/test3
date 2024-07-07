<?php

namespace App\Entity;

use App\Repository\PrintConstancesActivitiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrintConstancesActivitiesRepository::class)]
class PrintConstancesActivities
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $printConstancesId = null;

    #[ORM\Column(nullable: true, options: ['comment' => 'Status columns'])]
    private ?int $status = null;

    #[ORM\Column(options: ['default' => 0, 'comment' => 'The Unix timestamp when the demand was updated.'])]
    private ?int $updated = 0;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cancelReason = null;

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
        return $this->cancelReason;
    }

    public function setCancelReason(?string $cancelReason): static
    {
        $this->cancelReason = $cancelReason;

        return $this;
    }

    public function getPrintConstancesId(): ?int
    {
        return $this->printConstancesId;
    }

    public function setPrintConstancesId(int $printConstancesId): static
    {
        $this->printConstancesId = $printConstancesId;

        return $this;
    }
}
