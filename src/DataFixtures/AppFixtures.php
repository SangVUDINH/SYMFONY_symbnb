<?php

namespace App\DataFixtures;

use App\Entity\Ad;

use Faker\Factory;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for($i = 1; $i< 5;$i++){
            $ad = new Ad;
            $title = $faker->sentence();
           
            
            $image = $faker->imageUrl(1000,350);
            $introduction = $faker->paragraph(2);
            $content = join($faker->paragraphs(5)) ;

            $ad->setTitle($title)
                
                ->setCoverImage($image)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setPrice(mt_rand(40,200))
                ->setRooms(mt_rand(1,5));

            for($j = 1; $j <= mt_rand(2,5); $j++){
                $image = new Image();

                $image  ->setUrl("https://media.routard.com/image/80/9/san-francisco.1479809.jpg")
                        ->setCaption($faker->sentence())
                        ->setAd($ad);

                $manager->persist($image);
            }

            $manager->persist($ad);
        }
        
        // connexion a la base
        $manager->flush();
    }
}
