<?php
namespace KAC\SiteBundle\Entity\Offer;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use KAC\SiteBundle\Entity\DescriptionInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="offer_conditions")
 * @ORM\HasLifecycleCallbacks()
 */
class Condition
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Offer", inversedBy="offers")
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Offer\ConditionType")
     */
    private $type;

    /**
     * @ORM\Column(name="parameters", type="array")
     */
    private $parameters;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
}