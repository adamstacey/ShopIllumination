<?php
namespace KAC\SiteBundle\Entity\Order;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_products")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Order", inversedBy="products")
     */
    private $order;

    /**
     * @ORM\Column(name="basket_item_id", type="string", length=255)
     */
    private $basketItemId;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\Variant")
     */
    private $variant;

    /**
     * @ORM\Column(name="quantity", type="integer", length=11)
     */
    private $quantity;

    /**
     * @ORM\Column(name="sub_total", type="decimal", precision=12, scale=4)
     */
    private $subTotal;

    /**
     * @ORM\Column(name="selected_options", type="text")
     */
    private $selectedOptions;

    /**
     * @ORM\Column(name="selected_option_labels", type="text")
     */
    private $selectedOptionLabels;

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
     * Set basketItemId
     *
     * @param string $basketItemId
     * @return Product
     */
    public function setBasketItemId($basketItemId)
    {
        $this->basketItemId = $basketItemId;

        return $this;
    }

    /**
     * Get basketItemId
     *
     * @return string
     */
    public function getBasketItemId()
    {
        return $this->basketItemId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set subTotal
     *
     * @param float $subTotal
     * @return Product
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    /**
     * Get subTotal
     *
     * @return float
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set selectedOptions
     *
     * @param string $selectedOptions
     * @return Product
     */
    public function setSelectedOptions($selectedOptions)
    {
        $this->selectedOptions = $selectedOptions;

        return $this;
    }

    /**
     * Get selectedOptions
     *
     * @return string
     */
    public function getSelectedOptions()
    {
        return $this->selectedOptions;
    }

    /**
     * Set selectedOptionLabels
     *
     * @param string $selectedOptionLabels
     * @return Product
     */
    public function setSelectedOptionLabels($selectedOptionLabels)
    {
        $this->selectedOptionLabels = $selectedOptionLabels;

        return $this;
    }

    /**
     * Get selectedOptionLabels
     *
     * @return string
     */
    public function getSelectedOptionLabels()
    {
        return $this->selectedOptionLabels;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set order
     *
     * @param \KAC\SiteBundle\Entity\Order $order
     * @return Product
     */
    public function setOrder(\KAC\SiteBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \KAC\SiteBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set product
     *
     * @param \KAC\SiteBundle\Entity\Product $product
     * @return Product
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
     * @param \KAC\SiteBundle\Entity\Product\Variant $variant
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
    }


    /**
     * @return \KAC\SiteBundle\Entity\Product\Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }
}