<?php

namespace App\Entity;

use App\Repository\ExerciseChangeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseChangeRepository::class)]
class ExerciseChange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $exercise_id = null;

    #[ORM\Column]
    private ?int $series = null;

    #[ORM\Column]
    private ?int $repetitions = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $create_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExerciseId(): ?int
    {
        return $this->exercise_id;
    }

    public function getSeries(): ?int
    {
        return $this->series;
    }

    public function getRepetitions(): ?int
    {
        return $this->repetitions;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }
}
