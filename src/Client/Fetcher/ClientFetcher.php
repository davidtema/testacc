<?php

declare(strict_types=1);

namespace App\Client\Fetcher;

use App\Client\Entity\Client;
use App\Client\Repository\ClientRepository;

final readonly class ClientFetcher
{
    public function __construct(private ClientRepository $repository)
    {
    }

    public function findOneById(int $id): ?Client
    {
        return $this->repository->findOneBy(['id' => $id]);
    }
}
