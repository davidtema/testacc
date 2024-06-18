<?php

declare(strict_types=1);

namespace App\Client\Command\Create;

use App\Client\Entity\Client;

/**
 * @see CreateClientHandler
 */
final readonly class CreateClientCommand
{
    public function __construct(public Client $client)
    {
    }
}
