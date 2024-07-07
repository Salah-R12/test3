<?php

namespace App\Entity;

use App\Repository\LettersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LettersRepository::class)]
#[ORM\Table(options: ['comment' => 'Letter template for printing'])]
class Letters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'lid')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
