<?php

declare(strict_types=1);

namespace App\Application\Decision;

use App\Application\Status;

final class ApprovedDecisionWithRiseRate extends DecisionAbstract
{
    private float $rate;

    public function __construct(string $message, float $rate)
    {
        parent::__construct($message);
        $this->rate = $rate;
        $this->status = Status::AGREE_CHANGE_RATE;
    }

    public function getRate(): float
    {
        return $this->rate;
    }
}
