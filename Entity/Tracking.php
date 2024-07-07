<?php

namespace App\Entity;

use App\Repository\TrackingRepository;
use App\Entity\User;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrackingRepository::class)]
#[ORM\Table(options: ['comment' => 'Table de tracage des actions des utilisateurs Symfony.'])]
class Tracking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(options: ['comment' => "Identifiant unique de l'action effectuée"])]
    private ?int $id = null;

    #[ORM\Column(length: 20, options: ['comment' => "Nom de l'action effectuée par l'utilisateur"])]
    private ?string $action = null;

    #[ORM\Column(length: 255, options: ['comment' => "Table affectée par l'action de l'utilisateur"])]
    private ?string $tablename = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ['comment' => "Le moment où l'action a été effectuée"])]
    private ?\DateTimeInterface $dateaction = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", nullable: false, options: ['comment' => "L'utilisateur ayant effectué l'action"])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getTablename(): ?string
    {
        return $this->tablename;
    }

    public function setTablename(string $tablename): static
    {
        $this->tablename = $tablename;

        return $this;
    }

    public function getDateaction(): ?\DateTimeInterface
    {
        return $this->dateaction;
    }

    public function setDateaction(\DateTimeInterface $dateaction): static
    {
        $this->dateaction = $dateaction;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
