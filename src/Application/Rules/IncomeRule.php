<?php

declare(strict_types=1);

namespace App\Application\Rules;

use App\Application\Decision\DeclinedDecision;
use App\Client\Entity\Client;

final class IncomeRule extends AbstractRule
{
    private const INCOME_MIN = 1000;

    public function test(Client $client): bool
    {
        if ($client->getIncome() < self::INCOME_MIN) {
            $this->decision = new DeclinedDecision('Insufficient income.');

            return false;
        }

        return true;
    }
}
