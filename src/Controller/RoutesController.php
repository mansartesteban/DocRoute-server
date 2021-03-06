<?php
/**
 * Created by PhpStorm.
 * User: Esteban
 * Date: 22/02/2020
 * Time: 13:33
 */

namespace App\Controller;

use App\Entity\Method;
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
        $datas = [];
        $routeRepo = $this->getDoctrine()->getRepository(Route::class);

        $allRoutes = $routeRepo->findAll();

        $datas["routes"] = $allRoutes;

        $response = new JsonResponse(
            $this->jms->serialize($datas, "json"),
            200,
            [],
            true);

        return $response;
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
//            if (!($repoRoute->findBy(["path" => $objectToCreate["path"]]))) {


                $entityFound = new Route();
                $entityFound
                    ->setName($objectToCreate["name"])
                    ->setPath($objectToCreate["path"]);

                if (!empty($objectToCreate["method"])) {
                    $repoMethod = $this->getDoctrine()->getRepository(Method::class);
                    if (($methodFound = $repoMethod->find($objectToCreate["method"]))) {
                        $entityFound->addMethod($methodFound);
                    }

                }



                try {
                    $em->persist($entityFound);
                    $em->flush();

                    $returnResponse["status"] = 201;
                    $returnResponse["message"] = "Route créée avec succès";
                    $returnResponse["datas"]["object_created"] = $entityFound;

                } catch (\Exception $ex) {
                    $returnResponse["additional_message"] = $ex->getMessage();
                }

//            } else {
//                $returnResponse["status"] = 409;
//                $returnResponse["message"] = "Une route avec le même chemin existe déjà";
//                $returnResponse["datas"]["errors"] = [
//                    "path" => $returnResponse["message"]
//                ];
//            }

        }

        $response = new JsonResponse(
            $this->jms->serialize($returnResponse, "json"),
            $returnResponse["status"],
            [],
            true);
        return $response;
    }

    /**
     * @Router("/routes/{id<\d+>}", name="routes_update", methods={"PUT"})
     * @param Request $request
     * @return Response
     */
    public function update(Request $request) {
        $returnResponse = [
            "status" => 500,
            "message" => "Unknown error",
            "additional_message" => "",
            "datas" => []
        ];
        $em = $this->getDoctrine()->getManager();

        $req = json_decode($request->getContent(), true);

        $routeId = $request->attributes->get("id");
        if (!empty($routeId)) {

            $repoRoute = $this->getDoctrine()->getRepository(Route::class);
            $repoMethod = $this->getDoctrine()->getRepository(Method::class);

            $routeToUpdate = $repoRoute->find($routeId);

            if (!empty($routeToUpdate)) {
                if (!empty($req["object_to_update"])) {
                    $objectToUpdate = $req["object_to_update"];

                    $routeToUpdate
                        ->setName($objectToUpdate["name"])
                        ->setPath($objectToUpdate["path"]);
                    if (!empty($objectToUpdate["method"])) {
                        $method = $routeToUpdate->getMethod()->get(0);
                        if (!empty($method) && $method->getId() != $objectToUpdate["method"]) {
                            $routeToUpdate->removeMethod($method);
                        }
                        $routeToUpdate
                            ->addMethod($repoMethod->find($objectToUpdate["method"]));
                    }

                    try {
                        $em->persist($routeToUpdate);
                        $em->flush();

                        $returnResponse["status"] = 200;
                        $returnResponse["message"] = "Route modifiée";
                        $returnResponse["datas"]["object_updated"] = $routeToUpdate;

                    } catch (\Exception $ex) {
                        $returnResponse["additional_message"] = $ex->getMessage();
                    }

                } else {
                    $returnResponse["status"] = 404;
                    $returnResponse["message"] = "Aucune ressource envoyée";
                }
            } else {
                $returnResponse["status"] = 404;
                $returnResponse["message"] = "Aucune ressource trouvée";
            }
        } else {
            $returnResponse["status"] = 404;
            $returnResponse["message"] = "Aucune ressource trouvée";
        }

        $response = new JsonResponse(
            $this->jms->serialize($returnResponse, "json"),
            $returnResponse["status"],
            [],
            true);
        return $response;
    }


    /**
     * @Router("/routes/{id<\d+>}", name="routes_delete", methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request) {
        $returnResponse = [
            "status" => 500,
            "message" => "Unknown error",
            "additional_message" => "",
            "datas" => []
        ];
        $em = $this->getDoctrine()->getManager();

        $routeId = $request->attributes->get("id");
        if (!empty($routeId)) {

            $repoRoute = $this->getDoctrine()->getRepository(Route::class);
            $routeToDelete = $repoRoute->find($routeId);

            if (!empty($routeToDelete)) {

                try {
                    $em->remove($routeToDelete);
                    $em->flush();
                    $returnResponse["status"] = 200;
                    $returnResponse["datas"]["object_deleted"] = [
                        "id" => $routeId
                    ];
                    $returnResponse["message"] = "Route supprimée !";
                } catch (\Exception $ex) {
                    $returnResponse["message"] = "Impossible de supprimer la route";
                    $returnResponse["additional_message"] = $ex->getMessage();
                }

            } else {

                $returnResponse["status"] = 200;
                $returnResponse["message"] = "Cette route n'existe pas ou plus.";

            }
        }

        $response = new JsonResponse(
            $this->jms->serialize($returnResponse, "json"),
            $returnResponse["status"],
            [],
            true);

        return $response;
    }

}