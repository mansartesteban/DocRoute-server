<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 29/02/2020
 * Time: 10:58
 */

namespace App\Controller;

use App\Entity\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MethodController extends MainController {

    /**
     * @Route("/methods", name="_methods_list", methods={"GET"})
     */
    public function getMethods() {
        $datas = [];
        $methodRepo = $this->getDoctrine()->getRepository(Method::class);

        $allMethods = $methodRepo->findAll();

        $datas["methods"] = $allMethods;

        $response = new JsonResponse(
            $this->jms->serialize($datas, "json"),
            200,
            [],
            true);

        return $response;
    }

}