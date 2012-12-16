<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="statistics")
 * @ORM\HasLifecycleCallbacks()
 */
class Statistic
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	    
    /**
     * @ORM\Column(name="statistic_type", type="string", length=100)
     */
    private $statisticType;
    
	/**
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * @ORM\Column(name="data", type="text")
     */
    private $data;

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