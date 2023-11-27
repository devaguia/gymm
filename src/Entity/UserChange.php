<?php

namespace App\Entity;

use App\Repository\UserChangesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserChangesRepository::class)]
class UserChange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userChanges')]
    private ?User $user = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column]
    private ?float $height = null;

    #[ORM\Column]
    private ?\DateTime $create_at = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function getCreateAt(): ?\DateTime
    {
        return $this->create_at;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
