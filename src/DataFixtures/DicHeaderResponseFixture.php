<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 16/02/2020
 * Time: 19:16
 */

namespace App\DataFixtures;


use App\Entity\DicHeaderResponse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DicHeaderResponseFixture extends Fixture {

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $headers = [
            "Access-Control-Allow-Origin",
            "Access-Control-Allow-Credentials",
            "Access-Control-Expose-Headers",
            "Access-Control-Max-Age",
            "Access-Control-Allow-Methods",
            "Access-Control-Allow-Headers",
            "Accept-Patch",
            "Accept-Ranges",
            "Age",
            "Allow",
            "Alt-Svc",
            "Cache-Control",
            "Connection",
            "Content-Disposition",
            "Content-Encoding",
            "Content-Language",
            "Content-Length",
            "Content-Location",
            "Content-MD5",
            "Content-Range",
            "Content-Type",
            "Date",
            "Delta-Base",
            "ETag",
            "Expires",
            "IM",
            "Last-Modified",
            "Link",
            "Location",
            "P3P",
            "Pragma",
            "Proxy-Authenticate",
            "Public-Key-Pins",
            "Retry-After",
            "Server",
            "Set-Cookie",
            "Strict-Transport-Security",
            "Trailer",
            "Transfer-Encoding",
            "Tk",
            "Upgrade",
            "Vary",
            "Via",
            "Warning",
            "WWW-Authenticate",
            "X-Frame-Options"
        ];

        foreach ($headers as $header) {
            $headerEntity = new DicHeaderResponse();
            $headerEntity->setLabel($header);
            $manager->persist($headerEntity);
        }

        $manager->flush();
    }
}