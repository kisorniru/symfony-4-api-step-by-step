<?php
/**
 * Created by PhpStorm.
 * User: siddique
 * Date: 10/5/18
 * Time: 06:00 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class OfficesController extends Controller
{
    public function index(){

        $pageTitle = "Home Page";

        return $this->render('Offices/index.html.twig', [
            'title' => $pageTitle
        ]);

    }
}