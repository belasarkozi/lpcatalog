<?php

namespace App\Repository;

use App\Entity\Szerzo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Szerzo>
 *
 * @method Szerzo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Szerzo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Szerzo[]    findAll()
 * @method Szerzo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SzerzoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Szerzo::class);
    }

    public function add(Szerzo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Szerzo[] Returns an array of Szerzo objects
     */
    public function all(): array
    {
        return $this->createQueryBuilder('k')
            ->orderBy('k.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
