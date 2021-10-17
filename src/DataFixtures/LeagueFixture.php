<?php
declare(strict_types=1);

namespace Guess\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Guess\Domain\League\League;

final class LeagueFixture extends Fixture
{
    public const LEAGUE_1 = 'league.1';
    public const LEAGUE_2 = 'league.2';

    public function load(ObjectManager $manager): void
    {
        $league1 = $this->create(
            'league1',
            'logo1.png',
            1,
        );

        $league2 = $this->create(
            'league2',
            'logo2.png',
            2,
        );

        $manager->persist($league1);
        $manager->persist($league2);
        $manager->flush();

        $this->addReference(self::LEAGUE_1, $league1);
        $this->addReference(self::LEAGUE_2, $league2);
    }

    private function create(
        string $name,
        string $logo,
        int $leagueApiId,
    ): League {
        return new League(
            $name,
            $logo,
            $leagueApiId,
        );
    }
}
