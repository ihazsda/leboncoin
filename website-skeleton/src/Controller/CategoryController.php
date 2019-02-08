<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /** @var  EntityManagerInterface */
    protected $em;

    /**
     * CategoryController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/categories", name="app_categories")
     */
    public function categoriesAction(Request $request)
    {
        $query = $request->query->get('q', '');
        $categories = $this
            ->em
            ->getRepository(Category::class)
            ->findCategories($query)
        ;

        return new Response(json_encode($categories));
    }
}