<?php

declare(strict_types=1);

namespace App\Credit\Repository;

use App\Credit\Entity\Credit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

final class CreditRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Credit::class);
        $this->entityManager = $entityManager;
    }

    public function save(Credit $client): void
    {
        $this->entityManager->persist($client);
        $this->entityManager->flush();
    }
}
