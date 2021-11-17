<?php
declare(strict_types=1);

namespace Guess\Domain\Player;

interface PlayerRepositoryInterface
{
    public function store(Player $entity): Player;
}
