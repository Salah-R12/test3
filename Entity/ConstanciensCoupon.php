<?php

namespace App\Entity;

use App\Repository\ConstanciensCouponRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensCouponRepository::class)]
#[ORM\Table(options: ['comment' => 'CONSTANCIENS COUPON CODE Table'])]
class ConstanciensCoupon
{
    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', options: ['default' => 0])]    
    private ?Constanciens $constancien = null;

    #[ORM\Column(nullable: true)]
    private ?int $choice = null;

    #[ORM\Column(nullable: true)]
    private ?int $date = null;

    public function getConstancien(): ?Constanciens
    {
        return $this->constancien;
    }

    public function setConstancien(Constanciens $constancien): static
    {
        $this->constancien = $constancien;
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

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(?int $date): static
    {
        $this->date = $date;

        return $this;
    }
}
