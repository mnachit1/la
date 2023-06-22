<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\SpecialityEstablishments;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class SpecialityEstablishmentsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/SpecialityEstablishments/product', name: 'app_SpecialityEstablishments_product', methods: ["GET"])]
    public function index(): JsonResponse
    {

        $SpecialityEstablishmentss = $this->getDoctrine()->getRepository(SpecialityEstablishments::class)->findAll();

        $data = [];

        foreach ($SpecialityEstablishmentss as $SpecialityEstablishments) {
            $data = [
                'id' => $SpecialityEstablishments->getId(),
                'name' => $SpecialityEstablishments->getName(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/SpecialityEstablishments/product/store', name: 'store_SpecialityEstablishments_product', methods: ["POST"])]
    public function store(Request $request): JsonResponse
    {
        $SpecialityEstablishments = new SpecialityEstablishments();

        $SpecialityEstablishments->setName($request->request->get('name'));

        $this->em->persist($SpecialityEstablishments);
        $this->em->flush();
        return new JsonResponse(['message' => 'Data stored successfully']);
    }

    #[Route('/SpecialityEstablishments/product/{id}', name: 'show_SpecialityEstablishments_product',  methods: 'GET')]
    public function show($id): JsonResponse
    {
        $SpecialityEstablishments = $this->getDoctrine()->getRepository(SpecialityEstablishments::class)->find($id);

        if (!$SpecialityEstablishments) {
            return $this->json(['message' => "ID doesn't exist"]);
        }

        $data = [
            'id' => $SpecialityEstablishments->getId(),
            'name' => $SpecialityEstablishments->getName(),
        ];

        return $this->json($data);
    }

    #[Route('/SpecialityEstablishments/product/edit/{id}', name: 'update_SpecialityEstablishments_product',  methods: 'POST')]
    public function update($id, Request $request): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $SpecialityEstablishments = $entityManager->getRepository(SpecialityEstablishments::class)->find($id);

        if (!$SpecialityEstablishments) {
            return $this->json(['message' => "ID doesn't exist"]);
        }

        $name = $request->request->get('Name');

        $SpecialityEstablishments->setName($name);

        $entityManager->flush();

        return $this->json(['message' => "Updated successfully"]);
    }

    #[Route('/SpecialityEstablishments/product/destroy/{id}', name: 'destroy_SpecialityEstablishments_product',  methods: 'DELETE')]
    public function destroy($id): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $SpecialityEstablishments = $entityManager->getRepository(SpecialityEstablishments::class)->find($id);

        if (!$SpecialityEstablishments) {
            return $this->json(['message' => "ID doesn't exist"]);
        }

        $entityManager->remove($SpecialityEstablishments);
        $entityManager->flush();

        return $this->json(['message' => "destroy successfully"]);
    }
}
