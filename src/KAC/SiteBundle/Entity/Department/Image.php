<?php
namespace KAC\SiteBundle\Entity\Department;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Image as SiteImage;

/**
 * @ORM\Entity
 */
class Image extends SiteImage
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Department", inversedBy="images")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    protected $department;

    /**
     * Set department
     *
     * @param \KAC\SiteBundle\Entity\Department $department
     * @return Routing
     */
    public function setDepartment(\KAC\SiteBundle\Entity\Department $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return \KAC\SiteBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    public function getObjectType()
    {
        return 'department';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}