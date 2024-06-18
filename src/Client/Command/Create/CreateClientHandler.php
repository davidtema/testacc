<?php

declare(strict_types=1);

namespace App\Client\Command\Create;

use App\Client\Event\CreateClientEvent;
use App\Client\Repository\ClientRepository;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * @see CreateClientCommand
 */
#[AsMessageHandler]
final readonly class CreateClientHandler
{
    public function __construct(
        private ClientRepository $repository,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function __invoke(CreateClientCommand $command): void
    {
        $client = $command->client;
        $this->repository->save($client);
        $this->eventDispatcher->dispatch(new CreateClientEvent($client));
    }
}
