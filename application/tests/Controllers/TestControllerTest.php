<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testHello()
    {
        $client = static::createClient();

        $client->request('GET', '/hello');

        self::assertSame(200, $client->getResponse()->getStatusCode());
    }
}
