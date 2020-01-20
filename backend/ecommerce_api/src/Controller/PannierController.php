<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PannierController extends AbstractController
{
    /**
     * @Route("/pannier", name="pannier")
     */
    public function index()
    {
        return $this->render('pannier/index.html.twig', [
            'controller_name' => 'PannierController',
        ]);
    }
}
