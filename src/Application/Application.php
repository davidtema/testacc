<?php

declare(strict_types=1);

namespace App\Application;

use App\Application\Decision\ApprovedDecision;
use App\Application\Decision\Decision;
use App\Application\Rules\AddressRule;
use App\Application\Rules\AgeRule;
use App\Application\Rules\ApplicationRule;
use App\Application\Rules\FicoRule;
use App\Application\Rules\IncomeRule;
use App\Client\Entity\Client;

final readonly class Application
{
    /**@var ApplicationRule[] $rules */
    private array $rules;

    public function __construct()
    {
        $this->rules = [
            new FicoRule(),
            new IncomeRule(),
            new AgeRule(),
            new AddressRule()
        ];
    }

    public function canClientGetCredit(Client $client): Decision
    {
        foreach ($this->rules as $rule) {
            if (!$rule->test($client)) {
                return $rule->getDecision();
            }
        }

        return new ApprovedDecision('Credit is approved.');
    }
}
