<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/"),
     *     name="blog_index"
     * )
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'owner' => 'Manuel',
        ]);
    }

    /**
     * @Route("/blog/show/{slug}",
     * requirements={"slug"="[a-z0-9-]+"},
     * defaults={"slug"="Article Sans Titre"},
     * name="blog_article")
     */
    public function show($slug)
    {
        $slug = ucwords(str_replace('-', ' ', $slug));
        return $this->render('blog/show.html.twig', ['slug' =>$slug]);
    }

}
