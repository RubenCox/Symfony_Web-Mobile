<?php

namespace AppBundle\Controller\Web;


use AppBundle\Entity\Dokters;
use AppBundle\Entity\Lokalen;
use AppBundle\Entity\Patient;
use AppBundle\Form\DokterType;
use AppBundle\Form\LokalenType;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdminController extends FOSRestController
{

    /*  ADMIN GEDEELTE */

    /**
     * @Route("/admin/", name="admin")
     */
    public function indexAdmin(Request $request)
    {
        return $this->redirectToRoute('adminDokters');
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
     * @Route("/admin/dokters/add", name="dokterAdd")
     */
    public function addDokter(Request $request) {

        $dokter = new Dokters();
        $form = $this->createForm(DokterType::class, $dokter);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $naam = $form["naam"]->getData();
            $voornaam = $form["voornaam"]->getData();
            $nummer = $form["nummer"]->getData();
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $dokter->getProfielfoto();
            // Generate a unique name for the file before saving it
            $fileName = $voornaam. ' ' . $naam.md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/images/dokters';
            $file->move($brochuresDir, $fileName);
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $dokter->setProfielfoto($fileName);
            // ... persist the $product variable or any other work

            // perform some action, such as saving the task to the database
            $dokter->setNaam($naam);
            $dokter->setVoornaam($voornaam);
            $dokter->setNummer($nummer);

            $em = $this->getDoctrine()->getManager();
            $em->persist($dokter);
            $em->flush();

            $success = 'Dokter succesvol toegevoegd';
            return $this->redirectToRoute('adminDokters', array('success'=>$success));
        }
        return $this->render('admin/admin.dokters_add.html.twig', array(
            'form' => $form->createView(),
        ));
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
        $form = $this->createForm(DokterType::class, $dokter);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $naam = $form["naam"]->getData();
            $voornaam = $form["voornaam"]->getData();
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $dokter->getProfielfoto();
            // Generate a unique name for the file before saving it
            $fileName = $voornaam. ' ' . $naam.md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/images/dokters';
            $file->move($brochuresDir, $fileName);
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $dokter->setProfielfoto($fileName);
            // ... persist the $product variable or any other work

            // perform some action, such as saving the task to the database
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
                $success = 'Dokter succesvol verwijderd';
                return $this->redirectToRoute('adminDokters', array('success'=>$success));
            }
            else{
                return $this->redirectToRoute('adminDokters');
            }


        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.dokters_delete.html.twig', $build);
    }

    /**
     * @Route("/admin/lokalen", name="adminLokalen")
     */
    public function indexAdminLokalen(Request $request)
    {
        $conn = $this->get('database_connection');
        $lokalen = $conn->fetchAll('SELECT * FROM lokalen');

        $lokaal = $request->query->get('success');


        return $this->render('admin/admin.lokalen.html.twig', array(
            'lokalen' => $lokalen, 'success' => $lokaal
        ));

    }

    /**
     * @Route("/admin/lokalen/add", name="lokaalAdd")
     */
    public function addLokaal(Request $request) {

        $lokaal = new Lokalen();

        $conn = $this->get('database_connection');

        $form = $this->createFormBuilder($lokaal)
            ->add('Omschrijving', 'text' , array('label' => '(vb: L150)'))
            ->add('save', 'submit', array('label' => 'Lokaal toevoegen'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            // perform some action, such as saving the task to the database
            $Omschrijving = $form["Omschrijving"]->getData();
            $lokaal = new Lokalen();
            $lokaal->setOmschrijving($Omschrijving);
            $lokaal->setArtsID('Geen');

            $em = $this->getDoctrine()->getManager();
            $em->persist($lokaal);
            $em->flush();

            $success = 'Lokaal successvol toegevoegd';
            return $this->redirectToRoute('adminLokalen', array('success'=>$success));
        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.lokalen_add.html.twig', $build);
    }

    /**
     * @Route("/admin/lokalen/edit/{id}", name="lokaalEdit")
     */
    public function editLokaal($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $lokaal = $em->getRepository('AppBundle:Lokalen')->find($id);
        if (!$lokaal) {
            throw $this->createNotFoundException(
                'No lokaal found for id ' . $id
            );
        }
        $form = $this->createForm(LokalenType::class, $lokaal);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $Omschrijving = $form["Omschrijving"]->getData();
            $ArtsID = $form["ArtsID"]->getData();
            $lokaal->setOmschrijving($Omschrijving);
            $lokaal->setArtsID(2);
            $em->flush();
            $success = 'Lokaal successvol bewerkt';
            return $this->redirectToRoute('adminLokalen', array('success'=>$success));
        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.lokalen_edit.html.twig', $build);
    }

    /**
     * @Route("/admin/lokalen/delete/{id}", name="lokaalDelete")
     */
    public function deleteLokaal($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $lokaal = $em->getRepository('AppBundle:Lokalen')->find($id);
        if (!$lokaal) {
            throw $this->createNotFoundException(
                'No lokaal found for id ' . $id
            );
        }
        $form = $this->createFormBuilder($lokaal)
            ->add('Ja', 'submit')
            ->add('Nee', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form->get('Ja')->isClicked()) {
                $em->remove($lokaal);
                $em->flush();
                $success = 'Lokaal successvol verwijderd';
                return $this->redirectToRoute('adminLokalen', array('success'=>$success));
            }
            else{
                return $this->redirectToRoute('adminLokalen');
            }


        }

        $build['form'] = $form->createView();
        return $this->render('admin/admin.lokalen_delete.html.twig', $build);
    }
}