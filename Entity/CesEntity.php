<?php

namespace App\Entity;

use App\Repository\CesEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CesEntityRepository::class)]
#[ORM\Table(options: ['comment' => 'The base table for CES Entity.'])]
#[ORM\Index(name: 'changed', columns:['changed'])]
#[ORM\Index(name: 'ces_entity_created', columns:['created'])]
#[ORM\Index(name: 'ces_entity_frontpage', columns:['status', 'created'])]
#[ORM\Index(name: 'ces_entity_status_type', columns:['status', 'type', 'cesid'])]
#[ORM\Index(name: 'ces_entity_title_type', columns:['title', 'type'])]
#[ORM\Index(name: 'ces_entity_type', columns:['type'])]
#[ORM\Index(name: 'user_id', columns:['user_id'])]
class CesEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'cesid', options: ['comment' => "The primary identifier for the CES Entity."])]
    private ?int $id = null;

    #[ORM\Column(length: 255, options: ['default' => "''", 'comment' => "The type (bundle) of this CES Entity."])]
    private ?string $type = "''";

    #[ORM\Column(length: 12, options: ['default' => "''", 'comment' => "The language of this CES Entity."])]
    private ?string $language = "''";

    #[ORM\Column(length: 255, options: ['default' => "''", 'comment' => "The title of the CES Entity."])]
    private ?string $title = "''";

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", options: ['comment' => "ID of Symfony user creator. (old Drupal ID)"])]
    private ?User $user = null;

    #[ORM\Column(options: ['default' => 1, 'comment' => "Boolean indicating whether the CES Entity is published (visible to non-administrators)."])]
    private ?int $status = 1;

    #[ORM\Column(options: ['default' => 0, 'comment' => "The Unix timestamp when the CES Entity was created."])]
    private ?int $created = 0;

    #[ORM\Column(options: ['default' => 0, 'comment' => "The Unix timestamp when the CES Entity was most recently saved."])]
    private ?int $changed = 0;

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

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getUid(): ?int
    {
        return $this->user;
    }

    public function setUid(int $user): static
    {
        $this->user = $user;

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

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(int $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getChanged(): ?int
    {
        return $this->changed;
    }

    public function setChanged(int $changed): static
    {
        $this->changed = $changed;

        return $this;
    }
}
