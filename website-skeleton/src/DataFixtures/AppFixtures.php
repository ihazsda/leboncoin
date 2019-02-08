<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cities = [
            'Les Avirons' => 97425,
            'Awala-Yalimapo' => 97319,
            'Apatou' => 97317,
            'Les Anses-d\'Arlet' => 97217,
            'L\'Ajoupa-Bouillon' => 97216,
            'La Bretagne' => 97490,
            'Bois-de-Nèfles' => 97490,
            'Beaufonds' => 97470,
            'Bellemène' => 97460,
            'Basse-Vallée' => 97442,
            'La Cressonnière' => 97440,
            'Cambuston' => 97440,
            'La Chaloupe' => 97416,
        ];

        $categories = [
            'Auto',
            'Vacances',
            'Immobilier',
            'Multimedia',
            'Mode',
            'Emploi',
            'Autres',
        ];

        foreach ($cities as $name => $zipcode) {
            $city = new City();
            $city->setName($name);
            $city->setZipcode($zipcode);

            $manager->persist($city);
        }

        foreach ($categories as $name) {
            $category = new Category();
            $category->setName($name);

            $manager->persist($category);
        }

        $manager->flush();
    }
}
