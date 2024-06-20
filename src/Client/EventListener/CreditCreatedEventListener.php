<?php

declare(strict_types=1);

namespace App\Client\EventListener;

use App\Credit\Event\CreateCreditEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener]
final class CreditCreatedEventListener
{
    public function __invoke(CreateCreditEvent $event): void
    {
        // Notify client (add queue task here).
    }
}
