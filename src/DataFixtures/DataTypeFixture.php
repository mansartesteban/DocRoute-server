<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 16/02/2020
 * Time: 19:03
 */

namespace App\DataFixtures;

use App\Entity\DataType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class DataTypeFixture extends Fixture {

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $types = [
            "String",
            "Int",
            "Float",
            "Boolean",
            "Date",
            "Time",
            "DateTime"
        ];

        foreach ($types as $type) {
            $dataType = new DataType();
            $dataType->setLabel($type);
            $manager->persist($dataType);
        }
        $manager->flush();
    }
}