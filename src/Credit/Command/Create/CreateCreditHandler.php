<?php

declare(strict_types=1);

namespace App\Credit\Command\Create;

use App\Application\Decision\ApprovedDecisionWithRiseRate;
use App\Application\Decision\Decision;
use App\Credit\Entity\Credit;
use App\Credit\Event\CreateCreditEvent;
use App\Credit\Repository\CreditRepository;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * @see CreateCreditCommand
 */
#[AsMessageHandler]
final readonly class CreateCreditHandler
{
    public function __construct(
        private CreditRepository $repository,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function __invoke(CreateCreditCommand $command): void
    {
        $credit = $command->credit;

        $client = $command->client;
        $credit->setClient($client);

        $this->applyDecision($credit, $command->decision);

        $this->repository->save($credit);
        $this->eventDispatcher->dispatch(new CreateCreditEvent($credit));
    }

    private function applyDecision(Credit $credit, Decision $decision): void
    {
        if (is_a($decision, ApprovedDecisionWithRiseRate::class)) {
            $credit->setRate($decision->getRate());
        }
    }
}
