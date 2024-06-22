<?php

declare(strict_types=1);

namespace App\Application\Rules;

use App\Address\Entity\State;
use App\Application\Decision\ApprovedDecisionWithRiseRate;
use App\Application\Decision\DeclinedDecision;
use App\Client\Entity\Client;

final class AddressRule extends AbstractRule
{
    public const STATE_ALLOW = [
        State::CALIFORNIA,
        State::NEW_YORK,
        State::NEVADA,
    ];
    public const CALIFORNIA_RATE = 11.49;

    public function test(Client $client): bool
    {
        if (!in_array($client->getAddress()->getState(), self::STATE_ALLOW)) {
            $this->decision = new DeclinedDecision("You can't get a loan in this state.");

            return false;
        }

        if (State::NEW_YORK === $client->getAddress()->getState()) {
            if (0 === mt_rand(0, 1)) {
                $this->decision = new DeclinedDecision("You can't get a loan in this state.");

                return false;
            }
        }

        if (State::CALIFORNIA === $client->getAddress()->getState()) {
            $this->decision = new ApprovedDecisionWithRiseRate(
                'The loan was approved with an increase in the rate.',
                self::CALIFORNIA_RATE
            );

            return false;
        }

        return true;
    }
}
