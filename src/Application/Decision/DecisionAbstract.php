<?php

declare(strict_types=1);

namespace App\Application\Decision;

use App\Application\Status;

abstract class DecisionAbstract implements Decision
{
    private string $message;

    protected Status $status;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}
