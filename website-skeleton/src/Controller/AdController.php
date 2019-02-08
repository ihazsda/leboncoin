<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('default/homepage.html.twig', [
        ]);
    }
}
