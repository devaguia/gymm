<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use function PHPUnit\Framework\isInstanceOf;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;
    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    #[ORM\Column(nullable: true)]
    private ?float $height = null;

    #[ORM\Column(nullable: true)]
    private ?bool $gender = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profile_picture = null;

    #[ORM\Column(name: 'updated_at', nullable: true)]
    private ?\DateTime $updated_at = null;

    #[ORM\Column(name: 'created_at', nullable: true)]
    private ?\DateTime $created_at = null;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: Exercise::class)]
    private Collection $exercises;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: Sheet::class, orphanRemoval: true)]
    private Collection $sheets;

    #[ORM\OneToMany(mappedBy: 'UserId', targetEntity: UserChange::class)]
    private Collection $userChanges;

    public function __construct()
    {
        $this->updatedTimestamps();
        $this->exercises = new ArrayCollection();
        $this->sheets = new ArrayCollection();
        $this->userChanges = new ArrayCollection();
    }

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function isGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(?bool $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAge(): ?\DateTime
    {
        return $this->age;
    }

    public function setAge($age): static
    {
        if (isInstanceOf(\DateTime::class, $age)) {
            $this->age = $age;
        } else {
            $this->age = new \DateTime($age);
        }

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profile_picture;
    }

    public function setProfilePicture(string $profile_picture): static
    {
        $this->profile_picture = $profile_picture;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updatedAt): static
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->created_at = $createdAt;

        return $this;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    /**
     * @return Collection<int, Exercise>
     */
    public function getExercises(): Collection
    {
        return $this->exercises;
    }

    public function addExercise(Exercise $exercise): static
    {
        if (!$this->exercises->contains($exercise)) {
            $this->exercises->add($exercise);
            $exercise->setUserId($this);
        }

        return $this;
    }

    public function removeExercise(Exercise $exercise): static
    {
        if ($this->exercises->removeElement($exercise)) {
            // set the owning side to null (unless already changed)
            if ($exercise->getUserId() === $this) {
                $exercise->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sheet>
     */
    public function getSheets(): Collection
    {
        return $this->sheets;
    }

    public function addSheet(Sheet $sheet): static
    {
        if (!$this->sheets->contains($sheet)) {
            $this->sheets->add($sheet);
            $sheet->setUserId($this);
        }

        return $this;
    }

    public function removeSheet(Sheet $sheet): static
    {
        if ($this->sheets->removeElement($sheet)) {
            // set the owning side to null (unless already changed)
            if ($sheet->getUserId() === $this) {
                $sheet->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserChange>
     */
    public function getUserChanges(): Collection
    {
        return $this->userChanges;
    }

    public function addUserChange(UserChange $userChange): static
    {
        if (!$this->userChanges->contains($userChange)) {
            $this->userChanges->add($userChange);
            $userChange->setUserId($this);
        }

        return $this;
    }

    public function removeUserChange(UserChange $userChange): static
    {
        if ($this->userChanges->removeElement($userChange)) {
            // set the owning side to null (unless already changed)
            if ($userChange->getUserId() === $this) {
                $userChange->setUserId(null);
            }
        }

        return $this;
    }

}
