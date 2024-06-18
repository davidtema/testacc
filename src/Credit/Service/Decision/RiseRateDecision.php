<?php

declare(strict_types=1);

namespace App\Credit\Service\Decision;

final readonly class RiseRateDecision implements Decision
{
    public function __construct(public float $newRate)
    {
    }
}
