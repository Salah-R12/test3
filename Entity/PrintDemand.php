<?php

namespace App\Entity;

use App\Repository\PrintDemandRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrintDemandRepository::class)]
#[ORM\Index(name: 'index_letter', columns: ['letter_id'])]
#[ORM\Index(name: 'updated', columns: ['updated'])]
class PrintDemand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $letterId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(options: ['default' => 0, 'comment' => 'The Unix timestamp when the demand was created.'])]
    private ?int $created = 0;

    #[ORM\Column(options: ['default' => 0, 'comment' => 'The Unix timestamp when the demand was updated.'])]
    private ?int $updated = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLetterId(): ?int
    {
        return $this->letterId;
    }

    public function setLetterId(int $letterId): static
    {
        $this->letterId = $letterId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(int $created): static
    {
        $this->created = $created;

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
}
