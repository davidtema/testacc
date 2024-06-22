<?php

declare(strict_types=1);

namespace Application\Rules;

use App\Application\Decision\DeclinedDecision;
use App\Application\Rules\AgeRule;
use App\Client\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class AgeRuleTest extends KernelTestCase
{
    public function testTooLowAge()
    {
        $rule = new AgeRule();
        $client = new Client();
        $client->setAge(15);
        self::assertFalse($rule->test($client));
        self::assertInstanceOf(DeclinedDecision::class, $rule->getDecision());
    }

    public function testTooHighAge()
    {
        $rule = new AgeRule();
        $client = new Client();
        $client->setAge(70);
        self::assertFalse($rule->test($client));
        self::assertInstanceOf(DeclinedDecision::class, $rule->getDecision());
    }

    public function testNormalAge()
    {
        $rule = new AgeRule();
        $client = new Client();
        $client->setAge(55);
        self::assertTrue($rule->test($client));
    }
}
