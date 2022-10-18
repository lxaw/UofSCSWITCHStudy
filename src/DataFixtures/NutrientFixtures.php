<?php

namespace App\DataFixtures;

use App\Entity\Nutrient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NutrientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nutrient1 = new Nutrient();
        $nutrient1->setName("Fat");

        $nutrient2 = new Nutrient();
        $nutrient2->setName("Protein");

        $nutrient3 = new Nutrient();
        $nutrient3->setName("Fiber");

        $nutrient4 = new Nutrient();
        $nutrient4->setName("Carbohydrate");

        $manager->persist($nutrient1);
        $manager->persist($nutrient2);
        $manager->persist($nutrient3);
        $manager->persist($nutrient4);

        $manager->flush();
    }
}
