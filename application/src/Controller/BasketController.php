<?php

namespace App\Controller;

use App\Events\BasketProductAdded;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class BasketController extends AbstractController
{
    /**
     * @Route("/basket", name="basket")
     */
    public function index()
    {
        return $this->render('basket/index.html.twig', [
            'controller_name' => 'BasketController',
        ]);
    }

    /**
     * @Route("/basket/add", name="add_product")
     */
    public function addProduct(EventDispatcherInterface $eventDispatcher)
    {
        $product = 'Tomates';

        /* ... add a product in the basket */
        
        $event = new BasketProductAdded($product, $this->getUser());

        echo '<pre>',print_r('DISPATCH EVENT ' . BasketProductAdded::NAME, true),'</pre>';

        $eventDispatcher->dispatch($event, BasketProductAdded::NAME);

        return $this->render('basket/index.html.twig', [
            'controller_name' => 'BasketController',
        ]);
    }
}
