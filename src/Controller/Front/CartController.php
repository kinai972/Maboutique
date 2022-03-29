<?php

declare(strict_types=1);

namespace App\Controller\Front;

use App\Class\Cart;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/mon-panier', name: 'cart')]
    public function index(Cart $cart, ProductRepository $repository): Response
    {
        $cartComplete = [];

        foreach ($cart->get() as $id => $quantity) {
            $cartComplete[] = [
                'product' => $repository->findOneById($id),
                'quantity' => $quantity
            ];
        }

        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete,
        ]);
    }

    #[Route('/ajouter-au-panier/{id}', name: 'addToCart')]
    public function add(Cart $cart, int $id): Response
    {
        $cart->add($id);

        return $this->redirectToRoute('cart');
    }

    #[Route('/mon-panier/vider', name: 'emptyCart')]
    public function empty(Cart $cart): Response
    {
        $cart->empty();

        return $this->redirectToRoute('products');
    }
}
