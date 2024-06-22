<?php

declare(strict_types=1);

namespace App\Client\Command\Update;

use App\Client\Event\UpdateClientEvent;
use App\Client\Repository\ClientRepository;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * @see UpdateClientCommand
 */
#[AsMessageHandler]
final readonly class UpdateClientHandler
{
    public function __construct(
        private ClientRepository $repository,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function __invoke(UpdateClientCommand $command): void
    {
        $client = $command->client;
        $this->repository->save($client);
        $this->eventDispatcher->dispatch(new UpdateClientEvent($client));
    }
}
