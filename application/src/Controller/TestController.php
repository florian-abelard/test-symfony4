<?php

namespace App\Controller;

use App\Services\ComplexObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ComplexObject $complexObject)
    {
        $request = Request::createFromGlobals();
        $name = $request->get('name');

        $response = new Response();

        $response->setContent(
            '<html><body>'
            .'Hello '
            .$name
            .'</body></html>'
        );
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');

        $complexObject->createdBy();

        // Retourne une réponse HTTP valide
        $response->send();
    }

    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/hello", name="hello")
     */
    public function hello()
    {
        $test = 'toto';

        echo $test;

        return $this->render('test/hello.html.twig', [
            'name' => 'Florian',
        ]);
    }

    public function helloWorld()
    {
        @trigger_error('Cette fonction est dépréciée, utilisez la fonction hello($name) à la place.', E_USER_DEPRECATED);

        return 'Hello World !';
    }
}
