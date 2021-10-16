<?php
declare(strict_types=1);

namespace Guess\DataFixtures;

use DateTimeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Guess\Domain\Game\Game;
use Guess\Domain\League\League;
use Guess\Domain\Team\Team;

final class GameFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

    }

    public function getDependencies(): array
    {
        return [
            LeagueFixture::class,
            TeamFixture::class,
        ];
    }

    private function create(
        League $league,
        Team $homeTeam,
        Team $awayTeam,
        DateTimeInterface $gameTime,
    ): Game {
        return new Game(
            $league,
            $homeTeam,
             $awayTeam,
            $gameTime,
        );
    }
}