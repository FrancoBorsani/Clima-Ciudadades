<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('homeView.html.twig');
    }




    /**
     * @Route("/insertarBD", name="insertarBD")
     */
    public function insertar(Request $request) {
 
        /* El objeto debería llamarse Post pero
         * al ser generado a partir de una base de datos
         * el objeto se llama como la tabla a la
         * que representa.
         */
 
        $post = new Posts();
 
     //   $post->setId($id);
        $post->setNombre($request);
        $post->setCantBuscado(1);
 
        //Entity Manager
        $em = $this->getDoctrine()->getEntityManager();
 
        //Persistimos en el objeto
        $em->persist($post);
 
        //Insertarmos en la base de datos
        $flush = $em->flush();
 
        if ($flush == null) {
            echo "Post creado correctamente";
        } else {
            echo "El post no se ha creado";
        }
 
      
        die();
    }







}
