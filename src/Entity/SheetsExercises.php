<?php

namespace App\Entity;

use App\Repository\SheetsExercisesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SheetsExercisesRepository::class)]
class SheetsExercises
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $sheet_id = null;

    #[ORM\Column]
    private ?int $exercise_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $create_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $update_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSheetId(): ?int
    {
        return $this->sheet_id;
    }

    public function setSheetId(int $sheet_id): static
    {
        $this->sheet_id = $sheet_id;

        return $this;
    }

    public function getExerciseId(): ?int
    {
        return $this->exercise_id;
    }

    public function setExerciseId(int $exercise_id): static
    {
        $this->exercise_id = $exercise_id;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }


    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }
}
