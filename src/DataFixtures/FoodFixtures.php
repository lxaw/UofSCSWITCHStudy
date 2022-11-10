<?php 
namespace App\DataFixtures;

use App\Entity\Food;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FoodFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $food = new Food();
        $food->setFoodName("Chicken");
        $food->setRestaurant("Chick Fil-A");
        $food->setFoodCategory("Meal");
        $food->setServingSize(150);
        $food->setServingSizeUnit("g");
        $food->setEnergyAmount(150);
        $food->setEnergyUnit("KCAL");

        $manager->persist($food);

        $manager->flush();
    }
}
