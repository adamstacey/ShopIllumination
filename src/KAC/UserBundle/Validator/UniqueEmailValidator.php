<?php
namespace KAC\UserBundle\Validator;

use Doctrine\Common\Persistence\ManagerRegistry;
use KAC\UserBundle\Entity\User;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UniqueEmailValidator extends ConstraintValidator
{
    /**
     * @var ManagerRegistry
     */
    private $registry;

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param User $user
     * @param Constraint $constraint
     * @throws \Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function validate($user, Constraint $constraint)
    {
        if(get_class($user) !== 'KAC\UserBundle\Entity\User')
        {
            throw new UnexpectedTypeException($user, 'KAC\UserBundle\Entity\User');
        }

        /**
         * @var $em EntityManager
         */
        $em = $this->registry->getManager();
        $qb = $em->getRepository('KAC\UserBundle\Entity\User')->createQueryBuilder('u');

        $result = $qb->where($qb->expr()->eq('u.emailCanonical', '?1'))
                ->andWhere($qb->expr()->neq('u.type', $qb->expr()->literal('guest')))
                ->setParameter(1, $user->getEmailCanonical())
                ->getQuery()
                ->execute();

        if (0 === count($result)) {
            return;
        }

        $this->context->addViolationAt('email', $constraint->message, array(), $user->getEmailCanonical());
    }
}