<?php
declare(strict_types=1);

namespace Guess\Infrastructure\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Guess\Domain\Player\Player;
use Guess\Domain\Player\PlayerRepositoryInterface;
use Throwable;

/**
 * @extends ServiceEntityRepository<Player>
 */
class PlayerRepository extends ServiceEntityRepository implements PlayerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    public function store(Player $entity): Player
    {
        $em = $this->getEntityManager();

        try {
            $em->persist($entity);
            $em->flush();
        } catch (Throwable) {
            throw new Exception('User cannot be store');
        }

        return $entity;
    }
}
