<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CategoryRepository extends ServiceEntityRepository
{
    /**
     * CategoryRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findCategories(string $query)
    {
        return $this
            ->createQueryBuilder('c')
            ->select('c.id as id, c.name as text')
            ->where('c.name LIKE :query')
            ->setParameter('query', sprintf("%s%%", $query))
            ->getQuery()
            ->getResult()
            ;
    }
}