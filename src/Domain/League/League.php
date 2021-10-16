<?php
declare(strict_types=1);

namespace Guess\Domain\League;

use DateTimeImmutable;
use DateTimeInterface;
use Nette\Utils\Strings;

class League
{
    private int $id;
    private string $name;
    private string $nameSlugged;
    private string $logo;
    private int $leagueApiId;
    private DateTimeInterface $createdAt;
    private ?DateTimeInterface $updatedAt;

    public function __construct(
        string $name,
        string $logo,
        int $leagueApiId,
    ) {
        $this->name = $name;
        $this->nameSlugged = Strings::webalize($name);
        $this->logo = $logo;
        $this->leagueApiId = $leagueApiId;
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

    public function getNameSlugged(): string
    {
        return $this->nameSlugged;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getLeagueApiId(): int
    {
        return $this->leagueApiId;
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