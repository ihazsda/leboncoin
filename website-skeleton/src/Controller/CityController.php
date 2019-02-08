<?php

namespace App\Controller;

use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /** @var  EntityManagerInterface */
    protected $em;

    /**
     * CityController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/cities", name="app_cities")
     */
    public function citiesAction(Request $request)
    {
        $query = $request->query->get('q', '');
        $cities = $this
            ->em
            ->getRepository(City::class)
            ->findCities($query)
        ;

        return new Response(json_encode($cities));
    }
}