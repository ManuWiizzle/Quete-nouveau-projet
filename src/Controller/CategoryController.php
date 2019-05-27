<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Form\CategoryType;
use App\Entity\Category;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category",
     *     name="form_index"
     * )
     */
    public function index(Request $request , ObjectManager $manager): Response
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category, ['method'=> Request::METHOD_GET]);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $manager->persist($category);
            $manager->flush();
        }
            return $this->render('category/form.html.twig', ['form' => $form->createView()]);
        }

}