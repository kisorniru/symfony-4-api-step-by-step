<?php
/**
 * Created by PhpStorm.
 * User: siddique
 * Date: 10/3/18
 * Time: 10:00 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class TestController extends Controller
{
    public function indexAction(SerializerInterface $serializer){

        $jsonResponse = $serializer->serialize("Hello Symfony!", 'json');
        return new Response($jsonResponse);

    }
}