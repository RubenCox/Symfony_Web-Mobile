<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Dokters;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DefaultController extends Controller
{
    /*  USER GEDEELTE  */
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



    /*  ADMIN GEDEELTE */
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
        $form = $this->createFormBuilder($dokter)
            ->add('naam', 'text')
            ->add('voornaam', 'text')
            ->add('profielfoto', 'text')
            ->add('brochure', FileType::class, array('label' => 'Brochure (PDF file)'))
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

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file **/
            $file = $product->getBrochure();
            // Generate a unique name for the file before saving it
                        $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
                        $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/
            uploads/brochures';
                        $file->move($brochuresDir, $fileName);
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $product->setBrochure($fileName);

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


    /**
     * @Route("/product/new", name="app_product_new")
     */
    public function newAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isValid()) {
// $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $product->getBrochure();
// Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
// Move the file to the directory where brochures are stored
            $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/
uploads/brochures';
            $file->move($brochuresDir, $fileName);
// Update the 'brochure' property to store the PDF file name
// instead of its contents
            $product->setBrochure($fileName);
// ... persist the $product variable or any other work
            return $this->redirectToRoute('homepage');
        }
        return $this->render('product/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
