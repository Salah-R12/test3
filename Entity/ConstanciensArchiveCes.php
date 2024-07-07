<?php

namespace App\Entity;

use App\Repository\ConstanciensArchiveCesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensArchiveCesRepository::class)]
#[ORM\Index(name:'constancien_id', columns:['constancien_id'])]
#[ORM\Index(name:'ces_id', columns:['ces_id'])]
#[ORM\Index(name:'eps_convoc_date', columns:['eps_convoc_date'])]
class ConstanciensArchiveCes
{
    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(onDelete: "CASCADE", referencedColumnName: 'constancien_id', options: ['default' => 0])]
    private ?Constanciens $constancien = null;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private ?int $cesId = 0;

    #[ORM\Column(nullable: true)]
    private ?int $updated = null;

    #[ORM\Column(options: ['comment' => 'Define if yes or no the constancien has been reinvited', 'default' => 0])]
    private ?int $cesPlace = 0;

    #[ORM\Column(type: Types::SMALLINT, options: ['comment' => 'Exclus du CES', 'default' => 0])]
    private ?int $excluded = 0;

    #[ORM\Column(nullable: true)]
    private ?int $cpam = null;

    #[ORM\Column(nullable: true, options: ['comment' => 'Date de mise à jour PND'])]
    private ?int $updatedPnd = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true, options: ['comment' => "Mois d'invitation"])]
    private ?\DateTimeInterface $invitationMonth = null;

    #[ORM\Column(nullable: true, options: ['comment' => 'Classe'])]
    private ?int $class = null;

    #[ORM\Column(type: Types::SMALLINT, options: ['comment' => "Rang d'invitation", 'default' => 0])]
    private ?int $invitationRank = 0;

    #[ORM\Column(nullable: true, options: ['default' => 0])]
    private ?int $epsConvocDate = 0;

    #[ORM\Column(nullable: true, options: ['comment' => 'Date de renvoie du coupon'])]
    private ?int $couponDate = null;

    #[ORM\Column(nullable: true, options: ['comment' => 'Date de début de convocation', 'default' => 0])]
    private ?int $epsDate = 0;

    #[ORM\Column(nullable: true, options: ['comment' => 'Choix du coupon', 'default' => 0])]
    private ?int $epsChoice = 0;

    public function getConstancien(): ?Constanciens
    {
        return $this->constancien;
    }

    public function setConstancien(Constanciens $constancien): static
    {
        $this->constancien = $constancien;

        return $this;
    }

    public function getCesId(): ?int
    {
        return $this->cesId;
    }

    public function setCes(CesEntity $cesId): static
    {
        $this->cesId = $cesId;

        return $this;
    }

    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    public function setUpdated(?int $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    public function getCesPlace(): ?int
    {
        return $this->cesPlace;
    }

    public function setCesPlace(int $cesPlace): static
    {
        $this->cesPlace = $cesPlace;

        return $this;
    }

    public function getExcluded(): ?int
    {
        return $this->excluded;
    }

    public function setExcluded(int $excluded): static
    {
        $this->excluded = $excluded;

        return $this;
    }

    public function getCpam(): ?int
    {
        return $this->cpam;
    }

    public function setCpam(?int $cpam): static
    {
        $this->cpam = $cpam;

        return $this;
    }

    public function getUpdatedPnd(): ?int
    {
        return $this->updatedPnd;
    }

    public function setUpdatedPnd(?int $updatedPnd): static
    {
        $this->updatedPnd = $updatedPnd;

        return $this;
    }

    public function getInvitationMonth(): ?\DateTimeInterface
    {
        return $this->invitationMonth;
    }

    public function setInvitationMonth(?\DateTimeInterface $invitationMonth): static
    {
        $this->invitationMonth = $invitationMonth;

        return $this;
    }

    public function getClass(): ?int
    {
        return $this->class;
    }

    public function setClass(?int $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function getInvitationRank(): ?int
    {
        return $this->invitationRank;
    }

    public function setInvitationRank(int $invitationRank): static
    {
        $this->invitationRank = $invitationRank;

        return $this;
    }

    public function getEpsConvocDate(): ?int
    {
        return $this->epsConvocDate;
    }

    public function setEpsConvocDate(?int $epsConvocDate): static
    {
        $this->epsConvocDate = $epsConvocDate;

        return $this;
    }

    public function getCouponDate(): ?int
    {
        return $this->couponDate;
    }

    public function setCouponDate(?int $couponDate): static
    {
        $this->couponDate = $couponDate;

        return $this;
    }

    public function getEpsDate(): ?int
    {
        return $this->epsDate;
    }

    public function setEpsDate(?int $epsDate): static
    {
        $this->epsDate = $epsDate;

        return $this;
    }

    public function getEpsChoice(): ?int
    {
        return $this->epsChoice;
    }

    public function setEpsChoice(?int $epsChoice): static
    {
        $this->epsChoice = $epsChoice;

        return $this;
    }
}
