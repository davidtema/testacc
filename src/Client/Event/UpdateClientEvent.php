<?php

declare(strict_types=1);

namespace App\Client\Event;

use App\Client\Entity\Client;
use Symfony\Contracts\EventDispatcher\Event;

final class UpdateClientEvent extends Event
{
    public function __construct(public readonly Client $client)
    {
    }
}
