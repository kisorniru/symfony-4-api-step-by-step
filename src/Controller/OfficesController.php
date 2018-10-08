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
                ->add('office_description', TextType::class, array('attr' => array('class' => 'form-control')))
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

}