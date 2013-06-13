<?php
namespace KAC\SiteBundle\Entity\Brand;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Routing as SiteRouting;

/**
 * @ORM\Entity
 */
class DepartmentRouting extends SiteRouting
{
    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Brand", inversedBy="routings")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    protected $brand;
    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Department", inversedBy="routings")
     * @ORM\JoinColumn(name="secondary_id", referencedColumnName="id")
     */
    protected $department;

    /**
     * Set brand
     *
     * @param \KAC\SiteBundle\Entity\Brand $brand
     * @return Routing
     */
    public function setBrand(\KAC\SiteBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return \KAC\SiteBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

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
        return 'brand_with_department';
    }
}