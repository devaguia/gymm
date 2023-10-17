<?php

namespace App\Entity;

use App\Repository\UserChangeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserChangeRepository::class)]
class UserChange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column]
    private ?float $height = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $create_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }
}
