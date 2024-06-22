<?php

declare(strict_types=1);

namespace Application\Rules;

use App\Address\Entity\Address;
use App\Address\Entity\State;
use App\Application\Decision\ApprovedDecisionWithRiseRate;
use App\Application\Decision\DeclinedDecision;
use App\Application\Rules\AddressRule;
use App\Client\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class AddressRuleTest extends KernelTestCase
{
    public function testDeclineDisallowedState()
    {
        $rule = new AddressRule();
        $client = new Client();
        $address = new Address();
        $address->setState(State::TEXAS);
        $client->setAddress($address);

        self::assertFalse($rule->test($client));
        self::assertInstanceOf(DeclinedDecision::class, $rule->getDecision());
        self::assertEquals(
            "You can't get a loan in this state.",
            $rule->getDecision()->getMessage()
        );
    }

    public function testApproveChangeRateStateCalifornia()
    {
        $rule = new AddressRule();
        $client = new Client();
        $address = new Address();
        $address->setState(State::CALIFORNIA);
        $client->setAddress($address);

        self::assertFalse($rule->test($client));
        /**@var ApprovedDecisionWithRiseRate $decision */
        $decision = $rule->getDecision();
        self::assertInstanceOf(ApprovedDecisionWithRiseRate::class, $decision);
        self::assertEquals('11.49', $decision->getRate());
    }

    public function testApproveState()
    {
        $rule = new AddressRule();
        $client = new Client();
        $address = new Address();
        $address->setState(State::NEVADA);
        $client->setAddress($address);

        self::assertTrue($rule->test($client));
    }
}
