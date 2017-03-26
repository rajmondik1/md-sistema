<?php

namespace AppBundle\Repository;

/**
 * ProgramaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProgramaRepository extends \Doctrine\ORM\EntityRepository
{
    public function stats()
    {
        $qb = $this->createQueryBuilder('t');
        $qb->select('count(t)');

        return $qb->getQuery()->getSingleScalarResult();
    }
}
