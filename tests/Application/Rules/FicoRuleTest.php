<?php

declare(strict_types=1);

namespace Application\Rules;

use App\Application\Decision\DeclinedDecision;
use App\Application\Rules\FicoRule;
use App\Client\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class FicoRuleTest extends KernelTestCase
{
    public function testLowFico()
    {
        $rule = new FicoRule();
        $client = new Client();
        $client->setFico('200');
        self::assertFalse($rule->test($client));
        self::assertInstanceOf(DeclinedDecision::class, $rule->getDecision());
    }

    public function testNormalFico()
    {
        $rule = new FicoRule();
        $client = new Client();
        $client->setFico('500');
        self::assertTrue($rule->test($client));
    }
}
