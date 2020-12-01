<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $categories = $manager->getRepository(Category::class)->findAll();

        for ($i = 1; $i <= 100; $i++)
        {
            $article = new Article();

            $sentence = $faker->sentence(4);
            $title = substr($sentence, 0, strlen($sentence) - 1);
            $index = rand(0, count($categories) - 1);
            $category = $categories[$index];

            $article->setTitle($title)
                    ->setAuthor($faker->name())
                    ->setContent($faker->text(1500))
                    ->setCreatedAt($faker->dateTimeThisYear())
                    ->setLikes(0)
                    ->setCategory($category);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
