<?php
declare(strict_types=1);

namespace Guess\Controller\Player;

use Guess\Application\CreatePlayerHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class PlayerController
{
    private CreatePlayerHandler $createPlayerHandler;

    public function __construct(CreatePlayerHandler $createPlayerHandler)
    {
        $this->createPlayerHandler = $createPlayerHandler;
    }

    public function index(Request $request): JsonResponse
    {
        /** @var array<string, string> $data */
        $data = json_decode($request->getContent(), true);

        try {
            $this->createPlayerHandler->handle($data);
        } catch (Throwable $e) {
            return new JsonResponse($e->getMessage());
        }

        return new JsonResponse('Player created.');
    }
}
