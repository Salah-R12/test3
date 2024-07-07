<?php

namespace App\Entity;

use App\Repository\LettersVersionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LettersVersionsRepository::class)]
#[ORM\Table(options: ['comment' => 'Letter versions'])]
class LettersVersions
{
    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'lid', onDelete: "CASCADE", referencedColumnName:'lid')]
    private ?Letters $letter = null;

    #[ORM\Column(length: 50)]
    private ?string $version = null;

    #[ORM\Column(nullable: true)]
    private ?int $insermLogo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $body = null;

    #[ORM\Column(options: ['default' => 0])]
    private ?int $status = 0;

    #[ORM\Column(options: ['default' => 0, 'comment' => 'The Unix timestamp when the letter was created.'])]
    private ?int $created = 0;

    #[ORM\Column(options: ['default' => 0, 'comment' => 'The Unix timestamp when the letter was updated.'])]
    private ?int $updated = 0;

    public function getLetter(): ?Letters
    {
        return $this->letter;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getInsermLogo(): ?int
    {
        return $this->insermLogo;
    }

    public function setInsermLogo(?int $insermLogo): static
    {
        $this->insermLogo = $insermLogo;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): static
    {
        $this->body = $body;

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
