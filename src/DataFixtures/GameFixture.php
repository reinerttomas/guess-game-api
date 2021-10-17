<?php
declare(strict_types=1);

namespace Guess\DataFixtures;

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
        /** @var League $league1 */
        $league1 = $this->getReference(LeagueFixture::LEAGUE_1);
        /** @var Team $team1 */
        $team1 = $this->getReference(TeamFixture::TEAM_1);
        /** @var Team $team2 */
        $team2 = $this->getReference(TeamFixture::TEAM_2);

        $game1 = $this->create(
            $league1,
            $team1,
            $team2,
            '1:1',
        );

        $game2 = $this->create(
            $league1,
            $team1,
            $team2,
            '2:0',
        );

        $manager->persist($game1);
        $manager->persist($game2);
        $manager->flush();
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
        string $score,
    ): Game {
        return new Game(
            $league,
            $homeTeam,
            $awayTeam,
            $score,
        );
    }
}
