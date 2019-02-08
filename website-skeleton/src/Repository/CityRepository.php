<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CityRepository extends ServiceEntityRepository
{
    /**
     * CityRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, City::class);
    }

    public function findCities(string $query)
    {
        return $this
            ->createQueryBuilder('c')
            ->select('c.name as text')
            ->where('c.name LIKE :query')
            ->setParameter('query', sprintf("%s%%", $query))
            ->getQuery()
            ->getResult()
            ;
    }
}