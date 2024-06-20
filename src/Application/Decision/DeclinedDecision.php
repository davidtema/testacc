<?php

declare(strict_types=1);

namespace App\Application\Decision;

use App\Application\Status;

final class DeclinedDecision extends DecisionAbstract
{
    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->status = Status::DECLINED;
    }
}
