<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 *
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

   /**
    * @return Categorie[] Returns an array of Categorie objects
    */
   public function findBySearch($slug, $value): ?categorie
   {
       return $this->createQueryBuilder('c')
           ->select('c', 'p')
           ->leftJoin('c.produits', 'p')
           ->andWhere('c.slug = :val')
           ->andWhere('p.nom Like :val2')
           ->setParameter('val', $slug)
           ->setParameter('val2', '%'. $value . '%')
           ->orderBy('p.nom', 'ASC')
           ->getQuery()
           ->getOneOrNullResult();
       ;
   }

//    public function findOneBySomeField($value): ?Categorie
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
