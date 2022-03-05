<?php

namespace App\Controller;

use App\DTO\SearchProductCriteria;
use App\Entity\Product;
use App\Form\SearchProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/nos-produits', name: 'products')]
    public function index(ProductRepository $repository, Request $request): Response
    {
        $criteria = new SearchProductCriteria();

        $form = $this->createForm(SearchProductType::class, $criteria);

        $form->handleRequest($request);

        return $this->render('product/index.html.twig', [
            'products'  => $repository->findAllByCriteria($criteria),
            'form'      => $form->createView(),
        ]);
    }

    #[Route('/nos-produits/{slug}', name: 'product')]
    public function show(Product $product): Response
    {
        // $product = $repository->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}
