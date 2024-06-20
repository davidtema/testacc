<?php

declare(strict_types=1);


namespace App\Address\Entity;

final class Town
{
    const NEW_YORK = 'NY';
    const SAN_FRANCISCO = 'SF';
    const LAS_VEGAS = 'LV';

    private string $name;

    private State $state;
}
