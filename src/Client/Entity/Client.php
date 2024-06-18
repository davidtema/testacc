<?php

declare(strict_types=1);

namespace App\Client\Entity;

use App\Client\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
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

    #[ORM\ManyToOne(targetEntity: \App\Address\Entity\Address::class)]
    #[ORM\JoinColumn(name: 'address_id')]
    private \App\Address\Entity\Address $address;

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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getSsn(): string
    {
        return $this->ssn;
    }

    /**
     * @param string $ssn
     */
    public function setSsn(string $ssn): void
    {
        $this->ssn = $ssn;
    }

    /**
     * @return string
     */
    public function getFico(): string
    {
        return $this->fico;
    }

    /**
     * @param string $fico
     */
    public function setFico(string $fico): void
    {
        $this->fico = $fico;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIncome(): int
    {
        return $this->income;
    }

    /**
     * @param int $income
     */
    public function setIncome(int $income): void
    {
        $this->income = $income;
    }

    /**
     * @return \App\Address\Entity\Address
     */
    public function getAddress(): \App\Address\Entity\Address
    {
        return $this->address;
    }

    /**
     * @param \App\Address\Entity\Address $address
     */
    public function setAddress(\App\Address\Entity\Address $address): void
    {
        $this->address = $address;
    }
}
