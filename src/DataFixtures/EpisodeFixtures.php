<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $seasons = $manager->getRepository(Season::class)->findAll();

        foreach ($seasons as $season) {
            for ($episodeNb = 1; $episodeNb < rand(1, 10); $episodeNb++) {
                $episode = new Episode();
                $episode->setNumber($episodeNb);
                $episode->setTitle($faker->text);
                $episode->setSynopsis($faker->paragraph);
                $episode->setSeason($season);
                $manager->persist($episode);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}