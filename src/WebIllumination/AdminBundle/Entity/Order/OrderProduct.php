<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_products")
 * @ORM\HasLifecycleCallbacks()
 */
class OrderProduct
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Order", inversedBy="discounts")
     */
    private $order;
    
    /**
     * @ORM\Column(name="basket_item_id", type="string", length=255)
     */
    private $basketItemId;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Order", inversedBy="discounts")
     */
    private $productId;
    
    /**
     * @ORM\Column(name="product", type="string", length=255)
     */
    private $product;
    
    /**
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * @ORM\Column(name="header", type="string", length=255)
     */
    private $header;
    
    /**
     * @ORM\Column(name="product_code", type="string", length=255)
     */
    private $productCode;
    
    /**
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;
    
    /**
     * @ORM\Column(name="short_description", type="string", length=255)
     */
    private $shortDescription;
    
    /**
     * @ORM\Column(name="quantity", type="integer", length=11)
     */
    private $quantity;
    
    /**
     * @ORM\Column(name="unit_cost", type="decimal", precision=12, scale=4)
     */
    private $unitCost;
    
    /**
     * @ORM\Column(name="recommended_retail_price", type="decimal", precision=12, scale=4)
     */
    private $recommendedRetailPrice;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4)
     */
    private $discount;
    
    /**
     * @ORM\Column(name="savings", type="decimal", precision=12, scale=4)
     */
    private $savings;
    
    /**
     * @ORM\Column(name="vat", type="decimal", precision=12, scale=4)
     */
    private $vat;
    
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
}