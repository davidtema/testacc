<?php

declare(strict_types=1);

namespace App\Client\Command\Update;

use App\Client\Entity\Client;

/**
 * @see UpdateClientHandler
 */
final readonly class UpdateClientCommand
{
    public function __construct(public Client $client)
    {
    }
}
