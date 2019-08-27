<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++){
            $article = new article();
            $article->setTitle(mb_strtolower($faker->sentence()));
            $article->setContent($faker->text);
            $manager->persist($article);
            $article->setCategory($this->getReference('categorie_'. rand(0, 4)));
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

}
