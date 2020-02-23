<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 22/02/2020
 * Time: 13:33
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route as Router;
use App\Entity\Route;

class RoutesController extends MainController {

    /**
     * @Router("/routes", name="routes_list", methods={"GET"})
     */
    public function read() {
        $routeRepo = $this->getDoctrine()->getRepository(Route::class);

        $allRoutes = $routeRepo->findAll();

        $datas["routes"] = $this->jms->serialize($allRoutes, "json");

        return new JsonResponse($datas);
    }

    /**
     * @Router("/routes", name="routes_create", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) {

        $returnResponse = [
            "status" => 500,
            "message" => "Unknown error",
            "additional_message" => "",
            "datas" => []
        ];
        $em = $this->getDoctrine()->getManager();

        $req = json_decode($request->getContent(), true);
        if (!empty($req["object_to_create"])) {
            $objectToCreate = $req["object_to_create"];

            $repoRoute = $this->getDoctrine()->getRepository(Route::class);

            // If a route with the same path already exists, doesn't create it
            if (!($repoRoute->findBy(["path" => $objectToCreate["path"]]))) {
                $entityFound = new Route();
                $entityFound
                    ->setName($objectToCreate["name"])
                    ->setPath($objectToCreate["path"]);

                try {
                    $em->persist($entityFound);
                    $em->flush();

                    $returnResponse["status"] = 201;
                    $returnResponse["message"] = "Route créée avec succès";

                } catch (\Exception $ex) {
                    $returnResponse["additional_message"] = $ex->getMessage();
                }

            } else {
                $returnResponse["status"] = 409;
                $returnResponse["message"] = "Une route avec le même chemin existe déjà";
            }

        }

        return new JsonResponse(json_encode($returnResponse, JSON_UNESCAPED_UNICODE), $returnResponse["status"], [], true);
    }

}