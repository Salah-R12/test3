<?php

namespace App\Entity;

use App\Repository\ConstanciensArchiveBirthdateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensArchiveBirthdateRepository::class)]
#[ORM\Index(name:'constancien_id', columns:['constancien_id'])]
class ConstanciensArchiveBirthdate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', nullable: false)]
    private ?Constanciens $constancien = null;

    #[ORM\Column]
    private ?int $oldBirthdate = null;

    #[ORM\Column]
    private ?int $newBirthdate = null;

    #[ORM\Column]
    private ?int $createdTime = null;

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

    public function getOldBirthdate(): ?int
    {
        return $this->oldBirthdate;
    }

    public function setOldBirthdate(int $oldBirthdate): static
    {
        $this->oldBirthdate = $oldBirthdate;

        return $this;
    }

    public function getNewBirthdate(): ?int
    {
        return $this->newBirthdate;
    }

    public function setNewBirthdate(int $newBirthdate): static
    {
        $this->newBirthdate = $newBirthdate;

        return $this;
    }

    public function getCreatedTime(): ?int
    {
        return $this->createdTime;
    }

    public function setCreatedTime(int $createdTime): static
    {
        $this->createdTime = $createdTime;

        return $this;
    }
}
