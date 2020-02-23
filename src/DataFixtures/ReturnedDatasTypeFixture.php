<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 16/02/2020
 * Time: 19:19
 */

namespace App\DataFixtures;

use App\Entity\ReturnedDatasType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReturnedDatasTypeFixture extends Fixture {

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $types = [
            "JSON",
            "XLM",
            "PlainText"
        ];

        foreach ($types as $type) {
            $returnedDatasType = new ReturnedDatasType();
            $returnedDatasType->setLabel($type);
            $manager->persist($returnedDatasType);
        }

        $manager->flush();
    }
}