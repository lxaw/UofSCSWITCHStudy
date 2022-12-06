<?php

namespace App\Repository;

use App\Entity\UsdaBrandedFood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsdaBrandedFood>
 *
 * @method UsdaBrandedFood|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsdaBrandedFood|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsdaBrandedFood[]    findAll()
 * @method UsdaBrandedFood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsdaBrandedFoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsdaBrandedFood::class);
    }

    public function save(UsdaBrandedFood $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UsdaBrandedFood $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UsdaBrandedFood[] Returns an array of UsdaBrandedFood objects
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

//    public function findOneBySomeField($value): ?UsdaBrandedFood
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
