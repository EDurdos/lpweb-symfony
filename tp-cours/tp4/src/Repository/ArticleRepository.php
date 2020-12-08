<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * Articles les plus aimés
     *
     * @param integer $number Nombre d'articles à afficher
     * @return array
     */
    public function findMostLiked(int $number): array
    {
        if ($number <= 0)
        {
            return [];
        }

        return $this->createQueryBuilder('a')
            ->addOrderBy('a.likes', 'DESC')
            ->addOrderBy('a.title', 'ASC')
            ->setMaxResults($number)
            ->getQuery()
            ->getResult();
    }

    /**
     * Articles les plus récents
     *
     * @param integer $number Nombre d'articles à afficher
     * @return array
     */
    public function findMostRecent(int $number): array
    {
        if ($number <= 0)
        {
            return [];
        }

        return $this->createQueryBuilder('a')
            ->addOrderBy('a.createdAt', 'DESC')
            ->addOrderBy('a.title', 'ASC')
            ->setMaxResults($number)
            ->getQuery()
            ->getResult();
    }
}
