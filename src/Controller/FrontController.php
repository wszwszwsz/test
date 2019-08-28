<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function main(Request $request)
    {
        $posts = $this->getDoctrine()->getManager()
            ->createQueryBuilder()
            ->from(Post::class, 'p')
            ->select('p')
            ->getQuery()
            ->getResult();
        return $this->render('front/index.html.twig', array('posts' => $posts));
    }

    /**
     * @Route("/write-blog-page", name="write_blog_page")
     */
    public function writeBlogPage()
    {
        return $this->render('front/write-blog-page.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/write-blog", name="write_blog")
     */
    public function create(Request $request)
    {
        $title = trim($request->request->get('title'));
        $content = trim($request->request->get('content'));

        $entityManager = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);
        $post->setCreatedAt(new \DateTime());

        $user = new User();
        $user->setName("Anonymous");
        $post->setUser($user);

        $entityManager->persist($post);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('main');
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
