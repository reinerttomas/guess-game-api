<?php
declare(strict_types=1);

namespace Guess\Domain\Player;

use DateTimeImmutable;
use DateTimeInterface;
use Guess\Domain\Game\Game;

class Guess
{
    private int $id;
    private Game $game;
    private Player $player;
    private string $value;
    private DateTimeInterface $createdAt;

    public function __construct(
        Game $game,
        Player $player,
        string $value,
    ) {
        $this->game = $game;
        $this->player = $player;
        $this->value = $value;
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }
}