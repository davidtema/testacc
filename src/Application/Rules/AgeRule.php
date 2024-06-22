<?php

declare(strict_types=1);

namespace App\Application\Rules;

use App\Application\Decision\DeclinedDecision;
use App\Client\Entity\Client;

final class AgeRule extends AbstractRule
{
    private const AGE_MIN = 18;
    private const AGE_MAX = 60;

    public function test(Client $client): bool
    {
        if ($client->getAge() < self::AGE_MIN
            || $client->getAge() > self::AGE_MAX) {
            $this->decision = new DeclinedDecision('Age discrepancy.');

            return false;
        }

        return true;
    }
}
