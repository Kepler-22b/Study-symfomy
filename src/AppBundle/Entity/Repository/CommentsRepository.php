<?php

namespace AppBundle\Entity\Repository;

/**
 * CommentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentsRepository extends \Doctrine\ORM\EntityRepository
{
	public function getComments($noteId, $approved = true)
	{
		$qb = $this->createQueryBuilder('c')
		           ->select('c')
		           ->where('c.note = :note_id')
		           ->addOrderBy('c.dateCreated')
		           ->setParameter('note_id', $noteId);

		if (false === is_null($approved))
			$qb->andWhere('c.approved = :approved')->setParameter('approved', $approved);

		return $qb->getQuery()->getResult();
	}
}
