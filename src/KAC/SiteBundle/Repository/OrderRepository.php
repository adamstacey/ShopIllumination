<?php
namespace KAC\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrderRepository extends EntityRepository
{
    public function findNumOrdersWithSameAddress($postZipCode, $email)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM KAC\SiteBundle\Entity\Order o
                WHERE (o.billingPostZipCode LIKE :postcode AND o.deliveryPostZipCode LIKE :postcode) AND o.emailAddress <> :email
            ')
            ->setParameter("postcode", $postZipCode)
            ->setParameter("email", $email)
            ->getSingleScalarResult();
    }

    public function findNumOrdersWithSameEmail($email)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM KAC\SiteBundle\Entity\Order o
                WHERE o.emailAddress = :email
            ')
            ->setParameter("email", $email)
            ->getSingleScalarResult();
    }

    public function findNumOrdersWithSameName($firstName, $lastName, $email)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM KAC\SiteBundle\Entity\Order o
                WHERE
                    (o.firstName = :firstName AND o.lastName = :lastName)
                    OR
                    (o.billingFirstName = :firstName AND o.billingLastName = :lastName)
                    OR
                    (o.deliveryFirstName = :firstName AND o.billingLastName = :lastName)
                    AND o.emailAddress != :email
            ')
            ->setParameter("firstName", $firstName)
            ->setParameter("lastName", $lastName)
            ->setParameter("email", $email)
            ->getSingleScalarResult();
    }

    public function findNumOrdersWithSameTelephone($telephone, $email)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM KAC\SiteBundle\Entity\Order o
                WHERE
                    o.telephoneDaytime = :telephone OR o.telephoneEvening = :telephone OR mobile = :telephone AND o.emailAddress != :email
            ')
            ->setParameter("telephone", $telephone)
            ->setParameter("email", $email)
            ->getSingleScalarResult();
    }
}