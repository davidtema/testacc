<?php

declare(strict_types=1);

namespace App\Credit\Service;

use App\Client\Entity\Client;
use App\Credit\Entity\Credit;
use App\Credit\Service\Decision\Decision;
use App\Credit\Service\Decision\DenyDecision;
use App\Credit\Service\Decision\SuccessDecision;

final readonly class Application
{
    const FICO_MIN = 500;
    const INCOME_MIN = 1000;
    const AGE_MIN = 18;
    const AGE_MAX = 60;

    public function __construct(private Credit $credit, private Client $client)
    {
    }

    public function canGetCredit(): Decision
    {
        if ($this->client->getFico() < self::FICO_MIN) {
            return new DenyDecision('Insufficient FICO.');
        }

        if ($this->client->getIncome() < self::INCOME_MIN) {
            return new DenyDecision('Insufficient income.');
        }

        if ($this->client->getAge() < self::AGE_MIN ||
            $this->client->getAge() > self::AGE_MAX) {
            return new DenyDecision('Age discrepancy.');
        }

        // todo state
        // todo town NY = rand

        return new SuccessDecision();
    }
}
