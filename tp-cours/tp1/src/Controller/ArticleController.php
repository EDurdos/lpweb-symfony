<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    //@Route("/", name="homepage")
    public function index(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $dql   = 'SELECT a FROM App\Entity\Article a';
        $query = $em->createQuery($dql);

        $articles = $paginator->paginate(
            $query,                             /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10,                                 /*limit per page*/
        );

        return $this->render('article/index.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/article/{id}", name="article.show")
     */
    public function show(ArticleRepository $articleRepository, $id)
    {
        $article = $articleRepository->find($id);
        if (!$article)
        {
            throw $this->createNotFoundException('The article does not exist');
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
