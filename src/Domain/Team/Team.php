<?php
declare(strict_types=1);

namespace Guess\Domain\Team;

use DateTimeImmutable;
use DateTimeInterface;

class Team
{
    private int $id;
    private string $name;
    private string $logo;
    private DateTimeInterface $createdAt;
    private ?DateTimeInterface $updatedAt;

    public function __construct(
        string $name,
        string $logo
    ) {
        $this->name = $name;
        $this->logo = $logo;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }
}