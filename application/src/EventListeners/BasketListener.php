<?php

namespace App\EventListeners;

use App\Events\BasketProductAdded;

class BasketListener
{
    public function doSomething(BasketProductAdded $event)
    {
        /* ... */

        echo '<pre>',print_r('LISTENER BasketProductAdded: ' . $event->getProduct(), true),'</pre>';
    }
}
