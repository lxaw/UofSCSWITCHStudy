<?php

namespace App\Repository;

use App\Entity\UsdaNonBrandedFood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsdaNonBrandedFood>
 *
 * @method UsdaNonBrandedFood|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsdaNonBrandedFood|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsdaNonBrandedFood[]    findAll()
 * @method UsdaNonBrandedFood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsdaNonBrandedFoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsdaNonBrandedFood::class);
    }

    public function save(UsdaNonBrandedFood $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UsdaNonBrandedFood $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UsdaNonBrandedFood[] Returns an array of UsdaNonBrandedFood objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsdaNonBrandedFood
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
