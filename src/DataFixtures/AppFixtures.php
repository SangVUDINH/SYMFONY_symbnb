<?php

namespace App\DataFixtures;

use App\Entity\Ad;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        $title = $faker->sentence();

        for($i = 1; $i< 30;$i++){
            $ad = new Ad;

            $title = $faker->sentence();
            $image = $faker->imageUrl(1000,350);
            $introduction = $faker->paragraph(2);
            $content = '<p>' . join('</p> <p>', $faker->paragraphs(5)) . '</p>' ;

            $ad->setTitle($title)
                ->setSlug("title-de-l-annonce numero $i")
                ->setCoverImage($image)
                ->setIntroduction($introduction)
                ->setContent("<p>je suis le contenue riche ! </p>")
                ->setPrice(mt_rand(40,200))
                ->setRooms(mt_rand(1,5));

            $manager->persist($ad);
        }
        
        // connexion a la base
        $manager->flush();
    }
}