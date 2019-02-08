<?php

namespace App\Repository;

use App\Entity\Ad;
use App\Entity\Category;
use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AdRepository extends ServiceEntityRepository
{
    /**
     * CityRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ad::class);
    }

    /**
     * @param string $type
     * @param City|null $city
     *
     * @return mixed
     */
    public function findAds(string $type, City $city = null, Category $category = null, ?string $title)
    {
        $qb = $this
            ->createQueryBuilder('a')
            ->where('a.type = :type')
            ->setParameter('type', $type);

        if ($city) {
            $qb = $qb
                ->andWhere('a.city = :city')
                ->setParameter('city', $city);
        }
        if ($category) {
            $qb = $qb
                ->andWhere('a.category = :category')
                ->setParameter('category', $category);
        }
        if ($title) {
            $qb = $qb
                ->andWhere('a.title LIKE :title')
                ->setParameter('title', sprintf("%%%s%%", $title));
        }

        return $qb
            ->getQuery()
            ->getResult();
    }
}