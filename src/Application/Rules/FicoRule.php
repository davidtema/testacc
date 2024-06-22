<?php

declare(strict_types=1);

namespace App\Application\Rules;

use App\Application\Decision\DeclinedDecision;
use App\Client\Entity\Client;

final class FicoRule extends AbstractRule
{
    private const FICO_MIN = 500;

    public function test(Client $client): bool
    {
        if ($client->getFico() < self::FICO_MIN) {
            $this->decision = new DeclinedDecision('Insufficient FICO.');
            return false;
        }

        return true;
    }
}
