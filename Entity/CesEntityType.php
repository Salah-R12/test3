<?php

namespace App\Entity;

use App\Repository\CesEntityTypeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CesEntityTypeRepository::class)]
#[ORM\Table(options: ['comment' => 'Stores information about all defined CES Entity types.'])]
#[ORM\Index(name:'type', columns:['type'])]
class CesEntityType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(options: ['comment' => 'Primary Key: Unique CES Entity type ID.'])]
    private ?int $id = null;

    #[ORM\Column(length: 32, options: ['comment' => 'The machine-readable name of this type.'])]
    private ?string $type = null;

    #[ORM\Column(length: 255, options: ['default' => "''", 'comment' => 'The human-readable name of this type.'])]
    private ?string $label = "''";

    #[ORM\Column(type: Types::TEXT, options: ['comment' => 'A brief description of this type.'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 1, 'comment' => 'The exportable status of the entity.'])]
    private ?int $status = 1;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => 'The name of the providing module if the entity has been defined in code.'])]
    private ?string $module = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): static
    {
        $this->module = $module;

        return $this;
    }
}
