<?php

declare(strict_types=1);

namespace App\Credit\Service;

use App\Credit\Entity\Credit;

final class CreditFetcher
{
    private static function all(): array
    {
        return [
            1 => Credit::create(1, 'Микроволновая печь', 12, 1000, 5),
            2 => Credit::create(2, 'Автомобиль', 12, 10000, 5),
        ];
    }

    /**
     * @return Credit[]
     */
    public function findAll(): array
    {
        return self::all();
    }
}
