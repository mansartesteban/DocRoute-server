<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 16/02/2020
 * Time: 19:18
 */

namespace App\DataFixtures;

use App\Entity\Method;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MethodFixture extends Fixture {

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $methods = [
            "GET",
            "POST",
            "PUT",
            "PATCH",
            "DELETE",
            "HEAD",
            "CONNECT",
            "OPTIONS",
            "TRACE",
        ];

        foreach ($methods as $method) {
            $methodEntity = new Method();
            $methodEntity->setLabel($method);
            $manager->persist($methodEntity);
        }
        $manager->flush();
    }
}