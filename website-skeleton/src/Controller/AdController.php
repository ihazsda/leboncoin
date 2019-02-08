<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Category;
use App\Entity\City;
use App\Entity\Enum\AdTypeEnum;
use App\Form\AdType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /** @var  EntityManagerInterface */
    protected $em;

    /**
     * AdController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepageAction()
    {
        $cities = $this
            ->em
            ->getRepository(City::class)
            ->findAll();

        return $this->render('default/homepage.html.twig', [
            'cities' => $cities,
        ]);
    }

    /**
     * @Route("/deals", name="app_deals")
     */
    public function dealsAction(Request $request)
    {
        $cityName = $request->query->get('city', '');
        $city = $this->em->getRepository(City::class)->findOneByName($cityName);
        $categoryName = $request->query->get('category', '');
        $category = $this->em->getRepository(Category::class)->findOneByName($categoryName);
        $title = $request->query->get('search', '');

        $cities = $this->em->getRepository(City::class)->findAll();
        $categories = $this->em->getRepository(Category::class)->findAll();

        $deals = $this->em->getRepository(Ad::class)->findAds(AdTypeEnum::SELL, $city, $category, $title);

        return $this->render('ad/deals.html.twig', [
            'ads' => $deals,
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/requests", name="app_requests")
     */
    public function requestsAction(Request $request)
    {
        $cityName = $request->query->get('city', '');
        $city = $this->em->getRepository(City::class)->findOneByName($cityName);
        $categoryName = $request->query->get('category', '');
        $category = $this->em->getRepository(Category::class)->findOneByName($categoryName);
        $title = $request->query->get('search', '');

        $cities = $this->em->getRepository(City::class)->findAll();
        $categories = $this->em->getRepository(Category::class)->findAll();

        $deals = $this->em->getRepository(Ad::class)->findAds(AdTypeEnum::BUY, $city, $category, $title);

        return $this->render('ad/requests.html.twig', [
            'ads' => $deals,
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/add-ad", name="app_add_ad")
     */
    public function addAdAction(Request $request){
        $ad = new Ad();
        $form = $this->createForm(AdType::class, $ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ad->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ad);
            $entityManager->flush();

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('ad/ad_form.html.twig', [
            'adForm' => $form->createView(),
        ]);
    }
}