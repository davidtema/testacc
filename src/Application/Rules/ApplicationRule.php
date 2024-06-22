<?php

namespace App\Application\Rules;

use App\Application\Decision\Decision;
use App\Client\Entity\Client;

interface ApplicationRule
{
    public function test(Client $client): bool;

    public function getDecision(): Decision;
}
