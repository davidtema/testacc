<?php

declare(strict_types=1);

namespace Application\Rules;

use App\Application\Decision\DeclinedDecision;
use App\Application\Rules\IncomeRule;
use App\Client\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class IncomeRuleTest extends KernelTestCase
{
    public function testTooLowIncome()
    {
        $rule = new IncomeRule();
        $client = new Client();
        $client->setIncome(500);
        self::assertFalse($rule->test($client));
        self::assertInstanceOf(DeclinedDecision::class, $rule->getDecision());
    }

    public function testNormalIncome()
    {
        $rule = new IncomeRule();
        $client = new Client();
        $client->setIncome(1000);
        self::assertTrue($rule->test($client));
    }
}
