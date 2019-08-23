<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function main()
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/write-blog", name="write_blog")
     */
    public function writeBlog()
    {
        return $this->render('front/write-blog.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/registry", name="registry")
     */
    public function registry()
    {
        return $this->render('front/registry.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('front/login.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
}
