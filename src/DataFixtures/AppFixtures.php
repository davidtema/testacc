<?php

namespace App\DataFixtures;

use App\Address\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $town1 = new Address();
        $town1->setZip('119-432');
        $town1->setState('NY');
        $town1->setTown('New York');
        $manager->persist($town1);

        $town2 = new Address();
        $town2->setZip('554-903');
        $town2->setState('CA');
        $town2->setTown('San Francisco');
        $manager->persist($town2);

        $town2 = new Address();
        $town2->setZip('284-031');
        $town2->setState('NV');
        $town2->setTown('Las Vegas');
        $manager->persist($town2);

        $manager->flush();
    }
}
