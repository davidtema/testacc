<?php

namespace App\Application\Decision;

use App\Application\Status;

interface Decision
{
    public function getStatus(): Status;

    public function getMessage(): string;
}
