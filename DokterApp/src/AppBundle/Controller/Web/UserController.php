<?php

namespace AppBundle\Controller\Web;


use AppBundle\Entity\Dokters;
use AppBundle\Entity\Lokalen;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Product;
use AppBundle\Form\DokterType;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserController extends FOSRestController
{


    /*  USER GEDEELTE  */
    
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        /*$product = new Dokters();
        $product->setProfielfoto('ruben.jpg');
        $product->setVoornaam('Ruben');
        $product->setNaam('Cox');
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return new Response('Created Dokter '.$product->getVoornaam());*/

        $title = 'Openingsuren';


        $templateData = array('title' => $title);

        $view = $this->view()
            ->setTemplate("default/index.html.twig")
            ->setTemplateData($templateData)
        ;

        return $this->handleView($view);

        //return $this->render('default/index.html.twig', array());

    }


    /**
     * @Route("/dokters", name="dokters")
     */
    public function indexDokters(Request $request)
    {
        $conn = $this->get('database_connection');
        $dokters = $conn->fetchAll('SELECT * FROM dokters');

        return $this->render('default/dokters.html.twig', array(
            'dokters' => $dokters
        ));

    }

    /**
     * @Route("/dokters/info/{id}", name="doktersInfo")
     */
    public function indexInfoDokters($id, Request $request)
    {
        $conn = $this->get('database_connection');
        $dokters = $conn->fetchAll('SELECT * FROM dokters');
        $info = $id;

        return $this->render('dokter/dokters_info.html.twig', array(
            'dokters' => $dokters, 'info' => $info
        ));

    }

    /**
     * @Route("/lokalen", name="lokalen")
     */
    public function indexLokalen(Request $request)
    {
        $conn = $this->get('database_connection');
        $lokalen = $conn->fetchAll('SELECT * FROM lokalen');

        return $this->render('default/lokalen.html.twig', array(
            'lokalen' => $lokalen
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
            //->add('captchaCode', 'captcha', array(
             //   'captchaConfig' => 'captcha.config.basic_captcha'
            //))
            ->add('save', 'submit', array('label' => 'Registreer'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving the task to the database
            $naam = $form["Naam"]->getData();
            $voornaam = $form["Voornaam"]->getData();
            $email = $form["Email"]->getData();
            $patient = new Patient();
            $patient ->setNaam($naam);
            $patient >setVoornaam($voornaam);
            $patient ->setEmail($email);


            $em = $this->getDoctrine()->getManager();
            $em->persist($patient );
            $em->flush();

            $success = 'successvol geregistreerd';
            return $this->redirectToRoute('/registreer', array('success'=>$success));
        }
        return $this->render('default/registreer.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/about", name="about")
     */
    public function indexAbout(Request $request)
    {
        return $this->render('default/about.html.twig');

    }

}