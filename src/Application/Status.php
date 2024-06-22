<?php

declare(strict_types=1);

namespace App\Application;

enum Status
{
    case DECLINED;

    case APPROVED;

    case APPROVED_CHANGE_RATE;
}
