<?php

namespace App\Repository;

use App\Entity\Defi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Defi>
 *
 * @method Defi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Defi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Defi[]    findAll()
 * @method Defi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Defi::class);
    }

    public function add(Defi $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Defi $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Defi[] Returns an array of Defi objects
     */
    public function getDefisOfPlayer($player): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.JoueurDestinataire = :val')
            ->andWhere('d.date_reponse IS NULL')
            ->setParameter('val', $player)
            ->orderBy('d.created_at', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Defi
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
