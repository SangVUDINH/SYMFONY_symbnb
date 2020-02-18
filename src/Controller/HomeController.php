<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {
    /**
     * @Route("/hello/{prenom}/age/{age}", name="hello")
     * @Route("/hello", name="route_base")
     * @Route("/hello/{prenom}")
     * Montre la page qui dit bonjour
     *
     * @return void
     */
    public function hello($prenom="anonyme", $age=0) {
        return $this->render(
            'base.html.twig'
        );
    }


    /**
     * @Route("/", name="homepage")
     *
     * @return void
     */
    public function home(){
       return $this->render(
           'home.html.twig'
       );
    }


}
?>