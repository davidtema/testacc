<?php

namespace App\DataFixtures;

use App\Address\Entity\Address;
use App\Address\Entity\State;
use App\Address\Entity\Town;
use App\Client\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $town1 = new Address();
        $town1->setZip('31217');
        $town1->setState(State::NEW_YORK);
        $town1->setTown(Town::NEW_YORK);
        $manager->persist($town1);

        $town2 = new Address();
        $town2->setZip('40222');
        $town2->setState(State::CALIFORNIA);
        $town2->setTown(Town::SAN_FRANCISCO);
        $manager->persist($town2);

        $town3 = new Address();
        $town3->setZip('50451');
        $town3->setState(State::NEVADA);
        $town3->setTown(Town::LAS_VEGAS);
        $manager->persist($town3);

        $town4 = new Address();
        $town4->setZip('60119');
        $town4->setState(State::TEXAS);
        $town4->setTown(Town::DALLAS);
        $manager->persist($town4);

        // --- clients

        $client1 = new Client();
        $client1->setName('Олег');
        $client1->setSurname('Васильев');
        $client1->setAddress($town1);
        $client1->setAge(25);
        $client1->setIncome(3000);
        $client1->setSsn(111111111);
        $client1->setFico(500);
        $client1->setEmail('test@test.com');
        $client1->setPhone('555-555-555');
        $manager->persist($client1);

        $client2 = new Client();
        $client2->setName('Мария');
        $client2->setSurname('Егорова');
        $client2->setAddress($town2);
        $client2->setAge(55);
        $client2->setIncome(3000);
        $client2->setSsn(222222222);
        $client2->setFico(500);
        $client2->setEmail('test2@test.com');
        $client2->setPhone('444-444-444');
        $manager->persist($client2);

        $client3 = new Client();
        $client3->setName('Жорж');
        $client3->setSurname('Карасёв');
        $client3->setAddress($town4);
        $client3->setAge(44);
        $client3->setIncome(3000);
        $client3->setSsn(333333333);
        $client3->setFico(500);
        $client3->setEmail('test3@test.com');
        $client3->setPhone('333-333-333');
        $manager->persist($client3);

        $manager->flush();
    }
}
