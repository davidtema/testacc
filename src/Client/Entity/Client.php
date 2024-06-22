<?php

declare(strict_types=1);

namespace App\Client\Entity;

use App\Address\Entity\Address;
use App\Client\Repository\ClientRepository;
use App\Credit\Entity\Credit;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\Index(columns: ['id'])]
#[UniqueEntity('id')]
final class Client
{
    public const FICO_MIN = 300;
    public const FICO_MAX = 850;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 50, nullable: false)]
    private string $name;

    #[ORM\Column(length: 50, nullable: false)]
    private string $surname;

    #[ORM\Column(length: 2, nullable: false)]
    private int $age;

    #[ORM\ManyToOne(targetEntity: Address::class)]
    #[ORM\JoinColumn(name: 'address_id')]
    private Address $address;

    #[ORM\OneToMany(targetEntity: Credit::class, mappedBy: 'client', orphanRemoval: true)]
    private PersistentCollection $credits;

    #[ORM\Column(length: 32, nullable: false)]
    private string $ssn;

    #[ORM\Column(length: 3, nullable: false)]
    #[Assert\Range(
        min: self::FICO_MIN,
        max: self::FICO_MAX,
    )]
    private string $fico;

    #[ORM\Column(length: 100000, nullable: false)]
    private int $income;

    #[ORM\Column(length: 50, nullable: false)]
    private string $email;

    #[ORM\Column(length: 50, nullable: false)]
    private string $phone;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getSsn(): string
    {
        return $this->ssn;
    }

    public function setSsn(string $ssn): void
    {
        $this->ssn = $ssn;
    }

    public function getFico(): string
    {
        return $this->fico;
    }

    public function setFico(string $fico): void
    {
        $this->fico = $fico;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIncome(): int
    {
        return $this->income;
    }

    public function setIncome(int $income): void
    {
        $this->income = $income;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    public function getCredits(): PersistentCollection
    {
        return $this->credits;
    }

    public function setCredits(PersistentCollection $credits): void
    {
        $this->credits = $credits;
    }

    public function __toString(): string
    {
        return $this->name.' '.$this->surname.' ('.$this->address.')';
    }
}
