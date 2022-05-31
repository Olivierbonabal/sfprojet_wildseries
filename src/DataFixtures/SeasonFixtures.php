<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        
        $key = 0;
        foreach (ProgramFixtures::PROGRAMS as $title => $data) {
            for ($seasonNb = 1; $seasonNb <= rand(5, 10); $seasonNb++) {
                $season = new Season();
                $season->setNumber($seasonNb);
                $season->setDescription($faker->paragraph);
                $season->setProgram($this->getReference("program_" . $key));
                $season->setYear($faker->year);
                $manager->persist($season);
            }
            $key++;
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}