<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Service\CategoryDataProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CommunityController
 *
 * @Route("communities")
 */
class CommunityController extends AbstractController
{
    /**
     * @param EntityManagerInterface $em
     * @param CategoryDataProvider   $categoryDataProvider
     *
     * @Route("/", name="communities_index")
     *
     * @return JsonResponse
     */
    public function getAction(EntityManagerInterface $em, CategoryDataProvider $categoryDataProvider): JsonResponse
    {
        $categories = $em->getRepository(Category::class)->findAll();

        $result = $categoryDataProvider->provideModels($categories);

        return new JsonResponse(['groups' => $result]);
    }
}
