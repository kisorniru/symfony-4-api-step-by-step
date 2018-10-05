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

class OfficeEmployeesController extends Controller
{
    public function indexAction(SerializerInterface $serializer){

        $jsonResponse = $serializer->serialize("Hello Symfony!", 'json');
        return new Response($jsonResponse);

    }
}