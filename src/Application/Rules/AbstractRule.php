<?php

declare(strict_types=1);

namespace App\Application\Rules;

use App\Application\Decision\Decision;

abstract class AbstractRule implements ApplicationRule
{
    protected Decision $decision;

    public function getDecision(): Decision
    {
        return $this->decision;
    }
}
