<?php

namespace App\Repository;

use App\Entity\Kiado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kiado>
 *
 * @method Kiado|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kiado|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kiado[]    findAll()
 * @method Kiado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KiadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kiado::class);
    }

    public function add(Kiado $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Kiado[] Returns an array of Kiado objects
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
