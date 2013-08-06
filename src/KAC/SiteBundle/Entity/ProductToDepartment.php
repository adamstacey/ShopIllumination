<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_to_department")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductToDepartment
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product", inversedBy="departments")
     * @Assert\NotBlank()
     * @Assert\NotNull()
     **/
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Department")
     * @Assert\NotNull(groups={"flow_site_new_product_step1", "flow_site_new_product_step2", "site_edit_product_overview", "site_edit_product_departments"}, message="Select a department.")
     **/
    private $department;

    /**
     * @ORM\Column(name="display_order", type="integer", length=11, nullable=true)
     */
    private $displayOrder = 1;

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

    public function __clone()
    {
        if ($this->id) {
            $this->id = null;
        }
    }

    public function __toString()
    {
        return $this->getDepartment()->__toString();
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

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    }

    /**
     * Get displayOrder
     *
     * @return integer
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set product
     *
     * @param \KAC\SiteBundle\Entity\Product $product
     * @return ProductToDepartment
     */
    public function setProduct(\KAC\SiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \KAC\SiteBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set department
     *
     * @param \KAC\SiteBundle\Entity\Department $department
     * @return ProductToDepartment
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
}