<?php

declare(strict_types=1);

namespace App\Credit\Service\Decision;

final readonly class DenyDecision implements Decision
{
    public function __construct(public string $reason)
    {
    }
}
