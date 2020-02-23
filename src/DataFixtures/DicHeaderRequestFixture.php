<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 16/02/2020
 * Time: 19:16
 */

namespace App\DataFixtures;


use App\Entity\DicHeaderRequest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DicHeaderRequestFixture extends Fixture {

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $headers = [
            "A-IM",
            "Accept",
            "Accept-Charset",
            "Accept-Datetime",
            "Accept-Encoding",
            "Accept-Language",
            "Access-Control-Request-Method",
            "Access-Control-Request-Headers",
            "Authorization",
            "Cache-Control",
            "Connection",
            "Content-Encoding",
            "Content-Length",
            "Content-MD5",
            "Content-Type",
            "Cookie",
            "Date",
            "Expect",
            "Forwarded",
            "From",
            "Host",
            "HTTP2-Settings",
            "If-Match",
            "If-Modified-Since",
            "If-None-Match",
            "If-Range",
            "If-Unmodified-Since",
            "Max-Forwards",
            "Origin",
            "Pragma",
            "Proxy-Authorization",
            "Range",
            "Referer",
            "TE",
            "Trailer",
            "Transfer-Encoding",
            "User-Agent",
            "Upgrade",
            "Via",
            "Warning"
        ];

        foreach ($headers as $header) {
            $headerEntity = new DicHeaderRequest();
            $headerEntity->setLabel($header);
            $manager->persist($headerEntity);
        }

        $manager->flush();
    }
}