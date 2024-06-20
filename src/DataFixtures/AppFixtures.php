<?php

namespace App\DataFixtures;

use App\Address\Entity\Address;
use App\Address\Entity\State;
use App\Address\Entity\Town;
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

        $town2 = new Address();
        $town2->setZip('50451');
        $town2->setState(State::NEVADA);
        $town2->setTown(Town::LAS_VEGAS);
        $manager->persist($town2);

        $manager->flush();
    }
}
