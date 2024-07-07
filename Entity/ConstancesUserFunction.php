<?php

namespace App\Entity;

use App\Repository\ConstancesUserFunctionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstancesUserFunctionRepository::class)]
#[ORM\Index(name: 'profile_id', columns:['profile_id'])]
class ConstancesUserFunction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'function_id', options: ['comment' => 'Function ID auto_increment'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true, options: ['comment' => 'Function name'])]
    private ?string $functionName = null;

    #[ORM\Column(nullable: true, options: ['comment' => 'Mail content'])]
    private ?int $profileId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFunctionName(): ?string
    {
        return $this->functionName;
    }

    public function setFunctionName(?string $functionName): static
    {
        $this->functionName = $functionName;

        return $this;
    }

    public function getProfileId(): ?int
    {
        return $this->profileId;
    }

    public function setProfileId(?int $profileId): static
    {
        $this->profileId = $profileId;

        return $this;
    }
}
