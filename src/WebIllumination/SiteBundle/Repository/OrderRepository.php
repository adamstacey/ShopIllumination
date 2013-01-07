<?php
namespace WebIllumination\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrderRepository extends EntityRepository
{
    public function findNumOrdersWithSameAddress($postZipCode, $email)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM WebIllumination\SiteBundle\Entity\Order o
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
                FROM WebIllumination\SiteBundle\Entity\Order o
                WHERE o.emailAddress = :email
            ')
            ->setParameter("email", $email)
            ->getSingleScalarResult();
    }

    public function findNumOrdersWithSameName($firstName, $lastName, $billingFirstName, $billingLastName, $deliveryFirstName, $deliveryLastName)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM WebIllumination\SiteBundle\Entity\Order o
                WHERE
                    (o.firstName = :firstName AND o.lastName = :lastName)
                    OR
                    (o.billingFirstName = :billingFirstName AND o.billingLastName = :billingLastName)
                    OR
                    (o.deliveryFirstName = :billingFirstName AND o.billingLastName = :billingLastName)
            ')
            ->setParameter("firstName", $firstName)
            ->setParameter("lastName", $lastName)
            ->setParameter("billingFirstName", $billingFirstName)
            ->setParameter("billingLastName", $billingLastName)
            ->setParameter("deliveryFirstName", $deliveryFirstName)
            ->setParameter("billingLastName", $deliveryLastName)
            ->getSingleScalarResult();
    }

    public function findNumOrdersWithSameTelephone($telephone)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT COUNT(o)
                FROM WebIllumination\SiteBundle\Entity\Order o
                WHERE
                    o.telephoneDaytime = :telephone OR o.telephoneEvening = :telephone OR mobile = :telephone
            ')
            ->setParameter("telephone", $telephone)
            ->getSingleScalarResult();
    }
}