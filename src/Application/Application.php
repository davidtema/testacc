<?php

declare(strict_types=1);

namespace App\Application;

use App\Address\Entity\State;
use App\Application\Decision\ApprovedDecision;
use App\Application\Decision\ApprovedDecisionWithRiseRate;
use App\Application\Decision\Decision;
use App\Application\Decision\DeclinedDecision;
use App\Client\Entity\Client;

final readonly class Application
{
    public const FICO_MIN = 500;
    public const INCOME_MIN = 1000;
    public const AGE_MIN = 18;
    public const AGE_MAX = 60;
    public const STATE_ALLOW = [
        State::CALIFORNIA,
        State::NEW_YORK,
        State::NEVADA
    ];
    public const CALIFORNIA_RATE = 11.49;

    public function canClientGetCredit(Client $client): Decision
    {
        if ($client->getFico() < self::FICO_MIN) {
            return new DeclinedDecision('Insufficient FICO.');
        }

        if ($client->getIncome() < self::INCOME_MIN) {
            return new DeclinedDecision('Insufficient income.');
        }

        if ($client->getAge() < self::AGE_MIN ||
            $client->getAge() > self::AGE_MAX) {
            return new DeclinedDecision('Age discrepancy.');
        }

        if (!in_array($client->getAddress()->getState(), self::STATE_ALLOW)) {
            return new DeclinedDecision("You can't get a loan in this state.");
        }

        if ($client->getAddress()->getState() === State::NEW_YORK) {
            if (mt_rand(0, 1) === 0) {
                return new DeclinedDecision("You can't get a loan in this state.");
            }
        }

        if ($client->getAddress()->getState() === State::CALIFORNIA) {
            return new ApprovedDecisionWithRiseRate(
                'The loan was approved with an increase in the rate.',
                self::CALIFORNIA_RATE
            );
        }


        return new ApprovedDecision('Credit is approved.');
    }
}
