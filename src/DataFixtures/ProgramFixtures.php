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
        $program->setTitle('The Witcher');
        $program->setSynopsis('A wizard explore the legend of Geralt of rivia');
        $program->setCategory($this->getReference('category_Action'));

        $program->setTitle('Lost in space');
        $program->setSynopsis('A Family lost in space');
        $program->setCategory($this->getReference('category_Sci-Fi'));

        $program->setTitle('La roue du temps');
        $program->setSynopsis('Un groupe de jeunes en voyage');
        $program->setCategory($this->getReference('category_Aventure'));

        $program->setTitle('Naruto');
        $program->setSynopsis('histoires de ninjas & Samuraï');
        $program->setCategory($this->getReference('category_Animation'));

        $program->setTitle('The purge');
        $program->setSynopsis('une société ou l\'on regles ses comptes');
        $program->setCategory($this->getReference('category_Horreur'));



        $manager->persist($program);
        $manager->flush();


    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
