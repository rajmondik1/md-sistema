<?php
/**
 * Created by PhpStorm.
 * User: raimond
 * Date: 17.3.26
 * Time: 11.40
 */

namespace AppBundle\Repository;


class UserRepository extends \Doctrine\ORM\EntityRepository
{

    public function stats()
    {
        $qb = $this->createQueryBuilder('t');
        $qb->select('count(t)');

        return $qb->getQuery()->getSingleScalarResult();
    }


}