<?php
declare(strict_types=1);

namespace Guess\Domain\Player;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Player
{
    private int $id;
    private string $username;
    private string $email;
    private ?string $password;
    private int $point;
    private int $avatar;
    private bool $isActive;
    private DateTimeInterface $createdAt;
    private ?DateTimeInterface $updatedAt;
    private ArrayCollection $guesses;

    public function __construct(
        string $username,
        string $email,
        string $password,
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->point = 0;
        $this->avatar = 1;
        $this->isActive = true;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = null;
        $this->guesses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function getAvatar(): int
    {
        return $this->avatar;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @todo - anotace
     */
    public function getGuesses(): ArrayCollection
    {
        return $this->guesses;
    }
}