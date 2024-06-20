<?php

declare(strict_types=1);

namespace App\Credit\Command\Create;

use App\Application\Decision\Decision;
use App\Client\Entity\Client;
use App\Credit\Entity\Credit;

/**
 * @see CreateCreditHandler
 */
final readonly class CreateCreditCommand
{
    public function __construct(public Credit $credit, public Client $client, public Decision $decision)
    {
    }
}
