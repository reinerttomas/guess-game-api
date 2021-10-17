<?php
declare(strict_types=1);

namespace Guess\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Guess\Domain\Team\Team;

final class TeamFixture extends Fixture
{
    public const TEAM_1 = 'team.1';
    public const TEAM_2 = 'team.2';

    public function load(ObjectManager $manager): void
    {
        $team1 = $this->create(
            'team1',
            'logo1.png',
        );

        $team2 = $this->create(
            'team2',
            'logo2.png',
        );

        $manager->persist($team1);
        $manager->persist($team2);
        $manager->flush();

        $this->addReference(self::TEAM_1, $team1);
        $this->addReference(self::TEAM_2, $team2);
    }

    private function create(
        string $name,
        string $logo,
    ): Team {
        return new Team(
            $name,
            $logo,
        );
    }
}
