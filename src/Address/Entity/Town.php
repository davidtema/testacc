<?php

declare(strict_types=1);

namespace App\Address\Entity;

final class Town
{
    public const NEW_YORK = 'New York';
    public const SAN_FRANCISCO = 'San Francisco';
    public const LAS_VEGAS = 'Las Vegas';
    public const DALLAS = 'Dallas';

    private string $name;

    private State $state;
}
