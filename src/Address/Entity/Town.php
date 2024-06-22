<?php

declare(strict_types=1);


namespace App\Address\Entity;

final class Town
{
    const NEW_YORK = 'New York';
    const SAN_FRANCISCO = 'San Francisco';
    const LAS_VEGAS = 'Las Vegas';
    const DALLAS = 'Dallas';

    private string $name;

    private State $state;
}
