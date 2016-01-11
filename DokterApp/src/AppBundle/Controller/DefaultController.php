<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Dokters;
use AppBundle\Entity\Patient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        // create a task and give it some dummy data for this example
        $task = new Dokters();
        $task->setNaam('');
        $form = $this->createFormBuilder($task)
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('profielfoto', 'text')
            ->add('save', 'submit', array('label' => 'Create Dokter'))
            ->getForm();
        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));

        /*$product = new Afspraken();
        $product->setDokterID(3);
        $product->setPatientID(2);
        $product->setSymptomen('Hoofdpijn');
        $product->setUur('15u30');
        $product->setDatum(new \DateTime("02-02-2016"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return new Response('Created eMAIL Naam '.$product->getSymptomen());
        */
    }

    /**
     * @Route("/dokters", name="dokters")
     */
    public function indexDokters(Request $request)
    {

        // create a task and give it some dummy data for this example
        $task = new Dokters();
        $form = $this->createFormBuilder($task)
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('profielfoto', 'text')
            ->add('save', 'submit', array('label' => 'Create Dokter'))
            ->getForm();
        $form->handleRequest($request);
            if ($form->isValid()) {
    // perform some action, such as saving the task to the database
                $naam = $form["naam"]->getData();
                $voornaam = $form["voornaam"]->getData();
                $profielfoto = $form["profielfoto"]->getData();
                $product = new Dokters();
                $product->setNaam($naam);
                $product->setVoornaam($voornaam);
                $product->setProfielfoto($profielfoto);
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();
            }
        return $this->render('default/dokters.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/registreer", name="registreren")
     */
    public function indexRegistreer(Request $request)
    {

        // create a task and give it some dummy data for this example
        $task = new Patient();
        $task->setNaam('');
        $form = $this->createFormBuilder($task)
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('email', 'email')
            ->add('save', 'submit', array('label' => 'Registreer'))
            ->getForm();
        return $this->render('default/registreer.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
