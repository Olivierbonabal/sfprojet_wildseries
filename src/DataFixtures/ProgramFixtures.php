<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
         $program = new Program();
         $manager->persist($program);
        $manager->flush();
    }

    public function getDependencies()
    {
       
        return [
            CategoryFixtures::class,
        ];
    }
} 
