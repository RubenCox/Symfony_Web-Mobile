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
        return $this->render('default/index.html.twig', array(
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
        return new Response('Created eMAIL Naam '.$product->getSymptomen());*/

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
     * @Route("/admin/dokters", name="adminDokters")
     */
    public function indexAdminDokters(Request $request)
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
        $conn = $this->get('database_connection');
        $dokters = $conn->fetchAll('SELECT * FROM dokters');

        $dokter = $request->query->get('success');


        return $this->render('admin/admin.dokters.html.twig', array(
            'form' => $form->createView(), 'dokters' => $dokters, 'success' => $dokter
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

    /**
     * @Route("/about", name="about")
     */
    public function indexAbout(Request $request)
    {
        return $this->render('default/about.html.twig');

    }

    /**
     * @Route("/admin/dokters/add", name="dokterAdd")
     */
    public function addDokter(Request $request) {

        $dokter = new Dokters();
        $form = $this->createFormBuilder($dokter)
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('profielfoto', 'text')
            ->add('save', 'submit', array('label' => 'Add Dokter'))
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
            $success = 'Doctor added successfully';
            return $this->redirectToRoute('adminDokters', array('success'=>$success));

        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.dokters_add.html.twig', $build);
    }

    /**
     * @Route("/admin/dokters/edit/{id}", name="dokterEdit")
     */
    public function editDokter($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $dokter = $em->getRepository('AppBundle:Dokters')->find($id);
        if (!$dokter) {
            throw $this->createNotFoundException(
                'No doctor found for id ' . $id
            );
        }
        $form = $this->createFormBuilder($dokter)
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('profielfoto', 'text')
            ->add('save', 'submit', array('label' => 'Edit Doctor' ))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->flush();
            $success = 'Doctor edited successfully';
            return $this->redirectToRoute('adminDokters', array('success'=>$success));

        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.dokters_edit.html.twig', $build);
    }

    /**
     * @Route("/admin/dokters/delete/{id}", name="dokterDelete")
     */
    public function deleteDokter($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $dokter = $em->getRepository('AppBundle:Dokters')->find($id);
        if (!$dokter) {
            throw $this->createNotFoundException(
                'No doctor found for id ' . $id
            );
        }
        $form = $this->createFormBuilder($dokter)
            ->add('Ja', 'submit')
            ->add('Nee', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form->get('Ja')->isClicked()) {
                $em->remove($dokter);
                $em->flush();
                $success = 'Doctor removed successfully';
                return $this->redirectToRoute('adminDokters', array('success'=>$success));
            }
            else{
                return $this->redirectToRoute('adminDokters');
            }


        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.dokters_delete.html.twig', $build);
    }
}
