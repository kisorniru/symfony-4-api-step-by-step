<?php
/**
 * Created by PhpStorm.
 * User: siddique
 * Date: 10/5/18
 * Time: 06:00 PM
 */

namespace App\Controller;


use App\Entity\Offices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class OfficesController extends Controller
{
    public function index(){

        $pageTitle = "Office List";

        $offices = $this->getDoctrine()->getRepository(Offices::class)->findAll();

        return $this->render('Offices/index.html.twig', [
            'title' => $pageTitle,
            'offices' => $offices,
        ]);

    }

    public function create(Request $request){

        $pageTitle = "Create Page";

        $offices = new Offices();

        $form = $this->createFormBuilder($offices)
                ->add('office_name', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('office_description', TextareaType::class, array('attr' => array('class' => 'form-control')))
                ->add('office_save', SubmitType::class, array('label' => 'Submit', 'attr' => array('class'=>'btn btn-primary mt-3')))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $offices = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offices);
            $entityManager->flush();

            return $this->redirectToRoute('web_app_index');
        }

        return $this->render('Offices/create.html.twig', array(
            'title' => $pageTitle,
            'form' => $form->createView()
        ));

    }

    public function edit(Request $request, $id){

        $pageTitle = "Edit Page";

        $offices = $this->getDoctrine()->getRepository(Offices::class)->find($id);

        $form = $this->createFormBuilder($offices)
            ->add('office_name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('office_description', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('office_save', SubmitType::class, array('label' => 'Update', 'attr' => array('class'=>'btn btn-primary mt-3')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('web_app_index');
        }

        return $this->render('Offices/edit.html.twig', array(
            'title' => $pageTitle,
            'form' => $form->createView()
        ));

    }

    public function show(SerializerInterface $serializer, $id){

        $pageTitle = "Show Page";

        $offices = $this->getDoctrine()->getRepository(Offices::class)->find($id);

        return $this->render('Offices/show.html.twig', [
            'title' => $pageTitle,
            'offices' => $offices,
        ]);

    }

    public function delete($id){

        $offices = $this->getDoctrine()->getRepository(Offices::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($offices);
        $entityManager->flush();

        $response = new Response();
        $response->send();

    }

}