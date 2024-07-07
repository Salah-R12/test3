<?php

namespace App\Entity;

use App\Repository\ConstanciensRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstanciensRepository::class)]
#[ORM\Table(options: ['comment' => 'Table des volontaires'])]
#[ORM\Index(name:'invitation_month', columns:['invitation_month'])]
#[ORM\Index(name:'CES', columns:['CES'])]
#[ORM\Index(name:'CES_place', columns:['CES_place'])]
#[ORM\Index(name:'class', columns:['class'])]
#[ORM\Index(name:'reinvite', columns:['reinvite'])]
#[ORM\Index(name:'examen_np_realise', columns:['examen_np_realise'])]
#[ORM\Index(name:'desengagement', columns:['desengagement'])]
#[ORM\Index(name:'dt_desengagement', columns:['dt_desengagement'])]
class Constanciens
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'constancien_id', options: ['comment' => "Numero Constance"])]
    private ?int $id = null;

    #[ORM\Column(type: Types::BINARY, length: 255, nullable: true, options: ['comment' => "Prénom"])]
    private mixed $firstname = null;

    #[ORM\Column(type: Types::BINARY, length: 255, nullable: true, options: ['comment' => "Nom Patronymique"])]
    private mixed $namePatronymic = null;

    #[ORM\Column(type: Types::BINARY, length: 255, nullable: true, options: ['comment' => "Nom Marital"])]
    private mixed $nameMarital = null;

    #[ORM\Column(nullable: true, options: ['comment' => "Genre"])]
    private ?int $gender = null;

    #[ORM\Column(nullable: true, options: ['comment' => "Date de naissance"])]
    private ?int $birthDate = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Lieu de naissance"])]
    private ?string $birthPlace = null;

    #[ORM\Column(length: 255, nullable:true, options: ['comment' => "Departement de naissance"])]
    private ?string $birthDep = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true, options: ['comment' => "Mois d'invitation"])]
    private ?\DateTimeInterface $invitationMonth = null;

    #[ORM\Column(name: 'CES', options: ['comment' => "CES"])]
    private ?int $CES = null;

    #[ORM\Column(name: 'CPAM', nullable: true, options: ['comment' => "CPAM"])]
    private ?int $CPAM = null;

    #[ORM\Column(name:'CES_place', nullable: true, options: ['default' => 0, 'comment' => "Site du CES"])]
    private ?int $CESPlace = 0;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Complement d'adresse"])]
    private ?string $addressComplement = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Complement d'adresse"])]
    private ?string $addressComplement2 = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Numéro"])]
    private ?string $addressNum = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Bureau distributeur"])]
    private ?string $postDeliver = null;

    #[ORM\Column(length: 5, nullable: true, options: ['comment' => "Bureau distributeur code postal"])]
    private ?string $postcode = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Ville"])]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Pays"])]
    private ?string $country = null;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 0, 'comment' => "Exclus du CES"])]
    private ?int $excluded = 0;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 0, 'comment' => "Est un volontaire"])]
    private ?int $volunteer = 0;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 0, 'comment' => "La fiche a été validée"])]
    private ?int $validatedFiche = 0;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Point de remise"])]
    private ?string $pointRemise = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Mention adresse"])]
    private ?string $adresseMention = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Code caisse gestion"])]
    private ?string $codeCaisseGes = null;

    #[ORM\Column(length: 255, nullable: true, options: ['comment' => "Code centre paiement"])]
    private ?string $codeCentrePaie = null;

    #[ORM\Column(length: 2, nullable: true, options: ['comment' => "Code Régime"])]
    private ?string $codeRegime = null;

    #[ORM\Column(nullable: true, options: ['comment' => "Classe"])]
    private ?int $class = null;

    #[ORM\Column(nullable: true, options: ['comment' => "Mise à jour de l'adresse"])]
    private ?int $addressUpdated = null;

    #[ORM\Column(nullable: true)]
    private ?int $updated = null;

    #[ORM\Column(nullable: true, options: ['comment' => "Date mise à jour PND"])]
    private ?int $updatedPnd = null;

    #[ORM\Column(nullable: true, options: ['comment' => "Date de création"])]
    private ?int $created = null;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 0])]
    private ?int $invitationRank = 0;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $cellphone = null;

    #[ORM\Column(options: ['default' => 0, 'comment' => "status du constancien"])]
    private ?int $reinvite = 0;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 0, 'comment' => "Examen Neuropsy déjà réalisé (défault (0) non)"])]
    private ?int $examenNpRealise = 0;

    #[ORM\Column(type: Types::SMALLINT, options: ['default' => 0, 'comment' => "Constancien désengagé (défault (0) non)"])]
    private ?int $desengagement = 0;

    #[ORM\Column(options: ['default' => 0, 'comment' => "Date de désengagement"])]
    private ?int $dtDesengagement = 0;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFirstname(): mixed
    {
        return $this->firstname;
    }

    public function setFirstname(mixed $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getNamePatronymic(): mixed
    {
        return $this->namePatronymic;
    }

    public function setNamePatronymic(mixed $namePatronymic): static
    {
        $this->namePatronymic = $namePatronymic;

        return $this;
    }

    public function getNameMarital(): mixed
    {
        return $this->nameMarital;
    }

    public function setNameMarital(mixed $nameMarital): static
    {
        $this->nameMarital = $nameMarital;

        return $this;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(?int $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(?string $birthPlace): static
    {
        $this->birthPlace = $birthPlace;

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

    public function getCES(): ?int
    {
        return $this->CES;
    }

    public function setCES(?int $CES): static
    {
        $this->CES = $CES;

        return $this;
    }

    public function getCPAM(): ?int
    {
        return $this->CPAM;
    }

    public function setCPAM(?int $CPAM): static
    {
        $this->CPAM = $CPAM;

        return $this;
    }

    public function getCESPlace(): ?int
    {
        return $this->CESPlace;
    }

    public function setCESPlace(?int $CESPlace): static
    {
        $this->CESPlace = $CESPlace;

        return $this;
    }

    public function getAddressComplement(): ?string
    {
        return $this->addressComplement;
    }

    public function setAddressComplement(?string $addressComplement): static
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    public function getAddressComplement2(): ?string
    {
        return $this->addressComplement2;
    }

    public function setAddressComplement2(?string $addressComplement2): static
    {
        $this->addressComplement2 = $addressComplement2;

        return $this;
    }

    public function getAddressNum(): ?string
    {
        return $this->addressNum;
    }

    public function setAddressNum(?string $addressNum): static
    {
        $this->addressNum = $addressNum;

        return $this;
    }

    public function getPostDeliver(): ?string
    {
        return $this->postDeliver;
    }

    public function setPostDeliver(?string $postDeliver): static
    {
        $this->postDeliver = $postDeliver;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): static
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getVolunteer(): ?int
    {
        return $this->volunteer;
    }

    public function setVolunteer(int $volunteer): static
    {
        $this->volunteer = $volunteer;

        return $this;
    }

    public function getValidatedFiche(): ?int
    {
        return $this->validatedFiche;
    }

    public function setValidatedFiche(int $validatedFiche): static
    {
        $this->validatedFiche = $validatedFiche;

        return $this;
    }

    public function getBirthDep(): ?string
    {
        return $this->birthDep;
    }

    public function setBirthDep(string $birthDep): static
    {
        $this->birthDep = $birthDep;

        return $this;
    }

    public function getPointRemise(): ?string
    {
        return $this->pointRemise;
    }

    public function setPointRemise(?string $pointRemise): static
    {
        $this->pointRemise = $pointRemise;

        return $this;
    }

    public function getAdresseMention(): ?string
    {
        return $this->adresseMention;
    }

    public function setAdresseMention(?string $adresseMention): static
    {
        $this->adresseMention = $adresseMention;

        return $this;
    }

    public function getCodeCaisseGes(): ?string
    {
        return $this->codeCaisseGes;
    }

    public function setCodeCaisseGes(?string $codeCaisseGes): static
    {
        $this->codeCaisseGes = $codeCaisseGes;

        return $this;
    }

    public function getCodeCentrePaie(): ?string
    {
        return $this->codeCentrePaie;
    }

    public function setCodeCentrePaie(?string $codeCentrePaie): static
    {
        $this->codeCentrePaie = $codeCentrePaie;

        return $this;
    }

    public function getCodeRegime(): ?string
    {
        return $this->codeRegime;
    }

    public function setCodeRegime(?string $codeRegime): static
    {
        $this->codeRegime = $codeRegime;

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

    public function getAddressUpdated(): ?int
    {
        return $this->addressUpdated;
    }

    public function setAddressUpdated(?int $addressUpdated): static
    {
        $this->addressUpdated = $addressUpdated;

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

    public function getUpdatedPnd(): ?int
    {
        return $this->updatedPnd;
    }

    public function setUpdatedPnd(?int $updatedPnd): static
    {
        $this->updatedPnd = $updatedPnd;

        return $this;
    }

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(?int $created): static
    {
        $this->created = $created;

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

    public function getCellphone(): ?string
    {
        return $this->cellphone;
    }

    public function setCellphone(?string $cellphone): static
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    public function getReinvite(): ?int
    {
        return $this->reinvite;
    }

    public function setReinvite(int $reinvite): static
    {
        $this->reinvite = $reinvite;

        return $this;
    }

    public function getExamenNpRealise(): ?int
    {
        return $this->examenNpRealise;
    }

    public function setExamenNpRealise(int $examenNpRealise): static
    {
        $this->examenNpRealise = $examenNpRealise;

        return $this;
    }

    public function getDesengagement(): ?int
    {
        return $this->desengagement;
    }

    public function setDesengagement(int $desengagement): static
    {
        $this->desengagement = $desengagement;

        return $this;
    }

    public function getDtDesengagement(): ?int
    {
        return $this->dtDesengagement;
    }

    public function setDtDesengagement(int $dtDesengagement): static
    {
        $this->dtDesengagement = $dtDesengagement;

        return $this;
    }

    public function getBirthDate(): ?int
    {
        return $this->birthDate;
    }

    public function setBirthDate(?int $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
