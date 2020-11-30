<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        $categories = $this->repository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{id}", name="category.show")
     */
    public function show(int $id)
    {
        $category = $this->repository->find($id);
        if (!$category)
        {
            throw $this->createNotFoundException('The category does not exist');
        }

        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}
