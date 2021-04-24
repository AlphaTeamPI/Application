<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Stock;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="front")
     */
    public function index(): Response
    {
        $produits = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();
        $stocks = $this->getDoctrine()
            ->getRepository(Stock::class)
            ->findAll();
        return $this->render('front/index.html.twig', [
            'produits' => $produits,
            'stocks' => $stocks,
        ]);
    }
    /**
     * @Route("/produitf", name="produitf")
     */
    public function produit(): Response
    {

        $produits = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();
        $stocks = $this->getDoctrine()
            ->getRepository(Stock::class)
            ->findAll();
        return $this->render('front/produitf.html.twig', [
            'produits' => $produits,
            'stocks' => $stocks,
        ]);
    }
}
