<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAllGreaterThanPrice($price): array
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.price > :price')->setParameter('price', $price)
            ->orderBy('p.price', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

}
