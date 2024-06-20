<?php

declare(strict_types=1);

namespace App\Credit\Event;

use App\Credit\Entity\Credit;
use Symfony\Contracts\EventDispatcher\Event;

final class CreateCreditEvent extends Event
{
    public function __construct(public readonly Credit $credit)
    {
    }
}
