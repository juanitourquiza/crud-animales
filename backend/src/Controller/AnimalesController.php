<?php

namespace App\Controller;

use App\Entity\Animales;
use App\Form\AnimalesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/apis")
 */
class AnimalesController extends AbstractController
{
    /**
     * @Route("/animales", name="animales_index", methods={"GET"})
     */
    public function index(SerializerInterface $serializer)
    {
        $animales = $this->getDoctrine()
            ->getRepository(Animales::class)
            ->findAll();
        return $this->json($animales);
    }

    /**
     * @Route("/animales", name="animales_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $json = $request->get("json", null);

        if ($json != null) {
            $params = json_decode($json);
            $name = $params->name;
            $tipo = $params->tipo;
            $edad = $params->edad;
            $register = $params->register;

            $animal = new animales();
            $animal->setName($name);
            $animal->setTipo($tipo);
            $animal->setEdad($edad);
            $animal->setRegister($register);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($animal);
            $entityManager->flush();


            return $this->json([
                'status' => 'sucess', 'data' => 'Animal creado'
            ]);
        } else {
            return $this->json([
                'message' => 'Datos incorrectos'
            ]);
        }
    }

    /**
     * @Route("/animales/{id}", name="animales_show", methods={"GET"})
     */
    public function show(Request $request): Response
    {
        $id = $request->get("id");
        $animales = $this->getDoctrine()
            ->getRepository(Animales::class)
            ->findById($id);
        return $this->json($animales);
    }

    /**
     * @Route("/animales/{id}", name="animales_edit", methods={"PUT"})
     */
    public function edit(Request $request): Response
    {
        //Traigo el id del animal
        $id = $request->get("id");
        $json = $request->get("json", null);

        $em = $this->getDoctrine()->getManager();
        //Devuelve un objeto
        $animal = $em->getRepository(Animales::class)->findOneBy(
            array(
                "id" => $id
            )
        );
        if ($json != null) {
            $params = json_decode($json);
            $name = $params->name;
            $tipo = $params->tipo;
            $edad = $params->edad;
            $register = $params->register;

            //$animal = new animales();
            $animal->setName($name);
            $animal->setTipo($tipo);
            $animal->setEdad($edad);
            $animal->setRegister($register);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($animal);
            $entityManager->flush();


            return $this->json([
                'status' => 'sucess', 'data' => 'Animal actualizado'
            ]);
        } else {
            return $this->json([
                'message' => 'Datos incorrectos'
            ]);
        }
    }

    /**
     * @Route("/animales/{id}", name="animales_delete", methods={"DELETE"})
     */
    public function delete(Request $request): Response
    {
        $id = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $animal = $em->getRepository(Animales::class)->findOneById($id);
        $em->remove($animal);
        $em->flush();

        return $this->json([
            'status' => 'sucess', 'data' => 'Animal Eliminado'
        ]);
    }
}
