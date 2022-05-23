<?php

namespace App\Repository;

use App\Entity\Lemez;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lemez>
 *
 * @method Lemez|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lemez|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lemez[]    findAll()
 * @method Lemez[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LemezRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lemez::class);
    }

    public function add(Lemez $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
