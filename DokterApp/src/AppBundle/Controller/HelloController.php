<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class HelloController extends Controller
{
    /**
     * @Route("/hello/{id}", name="id")
     */
    public function indexAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product2')
            ->find($id);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return new Response('<html><body>Hello '.$product->getNaam().'!</body></html>');
    }

    /**
     * @Route("/hello/")
     */

    public function Test()
    {
        return new Response('<html><body>Hello H!</body></html>');
    }

}