<?php

namespace App\DataFixtures;
use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setRankNumber(1);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("carousel1.webp");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(2);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("carousel2.webp");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(3);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("carousel3.webp");
        $manager->persist($carousel);
        $manager->flush();
    }
}
