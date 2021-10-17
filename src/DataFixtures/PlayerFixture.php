<?php
declare(strict_types=1);

namespace Guess\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Guess\Domain\Player\Player;

final class PlayerFixture extends Fixture
{
    public const PLAYER_1 = 'player.1';
    public const PLAYER_2 = 'player.2';

    public function load(ObjectManager $manager): void
    {
        $player1 = $this->create(
            'player1',
            'player1@example.com',
            'Player1!',
        );

        $player2 = $this->create(
            'player2',
            'player2@example.com',
            'Player2!',
        );

        $manager->persist($player1);
        $manager->persist($player2);
        $manager->flush();

        $this->addReference(self::PLAYER_1, $player1);
        $this->addReference(self::PLAYER_2, $player2);
    }

    private function create(
        string $username,
        string $email,
        string $password,
    ): Player {
        return new Player(
            $username,
            $email,
            $password,
        );
    }
}
