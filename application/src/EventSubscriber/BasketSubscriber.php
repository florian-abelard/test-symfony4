<?php

namespace App\EventSubscriber;

use App\Events\BasketProductAdded;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BasketSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Liste des évènements, méthodes et priorités
        return [
            'basket.product_added' => [
                ['doSomething', 10]
            ]
        ];
    }

    public function doSomething(BasketProductAdded $event)
    {
        /* ... */

        echo '<pre>', print_r('SUBSCRIBER BasketProductAdded : ' . $event->getProduct(), true), '</pre>';
    }
}
