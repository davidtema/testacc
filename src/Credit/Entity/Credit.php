<?php

declare(strict_types=1);

namespace App\Credit\Entity;

use App\Client\Entity\Client;
use App\Credit\Repository\CreditRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: CreditRepository::class)]
#[ORM\Index(columns: ['id'])]
#[UniqueEntity('id')]
final class Credit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 50, nullable: false)]
    private string $name;

    #[ORM\Column(length: 3, nullable: false)]
    private int $term;

    #[ORM\Column(length: 5, nullable: false)]
    private float $rate;

    #[ORM\Column(length: 10, nullable: false)]
    private float $sum;

    #[ORM\ManyToOne(targetEntity: Client::class)]
    #[ORM\JoinColumn(name: 'client_id')]
    private Client $client;

    public static function create(int $id, string $name, int $term, float $sum, float $rate, Client $client): Credit
    {
        $credit = new self();
        $credit->id = $id;
        $credit->name = $name;
        $credit->term = $term;
        $credit->sum = $sum;
        $credit->rate = $rate;
        $credit->client = $client;

        return $credit;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTerm(): int
    {
        return $this->term;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setTerm(int $term): void
    {
        $this->term = $term;
    }

    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function __toString(): string
    {
        return $this->name.' (ставка: '.$this->rate.'%)';
    }
}
