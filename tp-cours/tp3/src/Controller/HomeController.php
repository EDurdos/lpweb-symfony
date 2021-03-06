<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArticleRepository $articleRepository)
    {
        return $this->render('home/index.html.twig', [
            'mostLikedArticles'  => $articleRepository->findMostLiked(5),
            'mostRecentArticles' => $articleRepository->findMostRecent(5),
        ]);
    }
}
