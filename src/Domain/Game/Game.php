<?php
declare(strict_types=1);

namespace Guess\Domain\Game;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Guess\Domain\League\League;
use Guess\Domain\Team\Team;

class Game
{
    private int $id;
    private League $league;
    private Team $homeTeam;
    private Team $awayTeam;
    private DateTimeInterface $gameTime;
    private DateTimeInterface $createdAt;
    private ?DateTimeInterface $updatedAt;
    private ArrayCollection $guesses;

    public function __construct(
        League $league,
        Team $homeTeam,
        Team $awayTeam,
        DateTimeInterface $gameTime,
    ) {
        $this->league = $league;
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->gameTime = $gameTime;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = null;
        $this->guesses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLeague(): League
    {
        return $this->league;
    }

    public function getHomeTeam(): Team
    {
        return $this->homeTeam;
    }

    public function getAwayTeam(): Team
    {
        return $this->awayTeam;
    }

    public function getGameTime(): DateTimeInterface
    {
        return $this->gameTime;
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