<?php

declare(strict_types=1);

namespace App\Class;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function add(int $id): void
    {
        $cart = $this->session->get('cart', []);

        $cart[$id] = !isset($cart[$id]) ? 1 : $cart[$id] + 1;

        $this->session->set('cart', $cart);
    }

    public function get(): array
    {
        return $this->session->get('cart');
    }

    public function empty()
    {
        return $this->session->remove('cart');
    }
}
