<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Buscado;
use Symfony\Component\HttpFoundation\Request;

use Redirect;
use View;
use App;
use Illuminate\Support\Facades\Hash;


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
     * @Route("/insertarBD", name="insertarBD", methods="POST")
     */
    public function insertar(Request $request) {
 
        /* El objeto debería llamarse Post pero
         * al ser generado a partir de una base de datos
         * el objeto se llama como la tabla a la
         * que representa.
         */

         // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $buscado = new Buscado();
        $buscado->setNombre($request->request->get('ciudadInsertada'));
        $buscado->setCantBuscado(1);

        $value=$request->request->get('ciudadInsertada');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($buscado);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
    
    
        return $this->render('secondHomeView.html.twig', [
            'value'=>$value

        ]);
    
    }


}
