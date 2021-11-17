<?php
declare(strict_types=1);

namespace Guess\Application;

use Exception;
use Guess\Domain\Player\Player;
use Guess\Infrastructure\Doctrine\PlayerRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreatePlayerHandler
{
    private PlayerRepository $playerRepository;
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(
        PlayerRepository $playerRepository,
        UserPasswordHasherInterface $userPasswordHasher,
    ) {
        $this->playerRepository = $playerRepository;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    /**
     * @param array<string, string> $data
     * @throws Exception
     */
    public function handle(array $data): Player
    {
        $player = new Player(
            $data['username'],
            $data['email'],
        );

        $player->changePassword(
            $this->userPasswordHasher->hashPassword($player, $data['password']),
        );

        return $this->playerRepository->store($player);
    }
}
