<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 22/02/2020
 * Time: 13:46
 */

namespace App\Controller;

use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

class MainController extends AbstractController {

    protected $jms = null;

    public function __construct() {
        $this->jms = SerializerBuilder::create()->build();
    }

//    protected function ReutrnJsonResponse($datas = [], $status = 200, $headers = []) {
//        if (empty($datas)) {
//            $datas["errors"] = "No data found";
//        }
//
//        $headers["content-type"] = "application/json";
//
//        return new JsonResponse($datas, $status, $headers, true);
//    }
}