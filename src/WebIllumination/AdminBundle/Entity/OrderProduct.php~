<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_product")
 * @ORM\HasLifecycleCallbacks()
 */
class OrderProduct
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="order_id", type="integer", length="11")
     */
    private $orderId;
    
    /**
     * @ORM\Column(name="basket_item_id", type="string", length="255")
     */
    private $basketItemId;
        
    /**
     * @ORM\Column(name="product_id", type="integer", length="11")
     */
    private $productId;
    
    /**
     * @ORM\Column(name="product", type="string", length="255")
     */
    private $product;
    
    /**
     * @ORM\Column(name="url", type="string", length="255")
     */
    private $url;
    
    /**
     * @ORM\Column(name="header", type="string", length="255")
     */
    private $header;
    
    /**
     * @ORM\Column(name="product_code", type="string", length="255")
     */
    private $productCode;
    
    /**
     * @ORM\Column(name="brand", type="string", length="255")
     */
    private $brand;
    
    /**
     * @ORM\Column(name="short_description", type="string", length="255")
     */
    private $shortDescription;
    
    /**
     * @ORM\Column(name="quantity", type="integer", length="11")
     */
    private $quantity;
    
    /**
     * @ORM\Column(name="unit_cost", type="decimal", precision="12", scale="4")
     */
    private $unitCost;
    
    /**
     * @ORM\Column(name="recommended_retail_price", type="decimal", precision="12", scale="4")
     */
    private $recommendedRetailPrice;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision="12", scale="4")
     */
    private $discount;
    
    /**
     * @ORM\Column(name="savings", type="decimal", precision="12", scale="4")
     */
    private $savings;
    
    /**
     * @ORM\Column(name="vat", type="decimal", precision="12", scale="4")
     */
    private $vat;
    
    /**
     * @ORM\Column(name="sub_total", type="decimal", precision="12", scale="4")
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
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
	 * @ORM\prePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\preUpdate
	 */
    public function update()
    {
        $this->updatedAt = new \DateTime();
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
     * Set orderId
     *
     * @param integer $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set basketItemId
     *
     * @param string $basketItemId
     */
    public function setBasketItemId($basketItemId)
    {
        $this->basketItemId = $basketItemId;
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
     * Set productId
     *
     * @param integer $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set product
     *
     * @param string $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * Get product
     *
     * @return string 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set header
     *
     * @param string $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set productCode
     *
     * @param string $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * Get productCode
     *
     * @return string 
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Set brand
     *
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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
     * Set unitCost
     *
     * @param decimal $unitCost
     */
    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;
    }

    /**
     * Get unitCost
     *
     * @return decimal 
     */
    public function getUnitCost()
    {
        return $this->unitCost;
    }

    /**
     * Set recommendedRetailPrice
     *
     * @param decimal $recommendedRetailPrice
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->recommendedRetailPrice = $recommendedRetailPrice;
    }

    /**
     * Get recommendedRetailPrice
     *
     * @return decimal 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * Set discount
     *
     * @param decimal $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Get discount
     *
     * @return decimal 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set savings
     *
     * @param decimal $savings
     */
    public function setSavings($savings)
    {
        $this->savings = $savings;
    }

    /**
     * Get savings
     *
     * @return decimal 
     */
    public function getSavings()
    {
        return $this->savings;
    }
    
    /**
     * Set vat
     *
     * @param decimal $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * Get vat
     *
     * @return decimal 
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set subTotal
     *
     * @param decimal $subTotal
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    }

    /**
     * Get subTotal
     *
     * @return decimal 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set selectedOptions
     *
     * @param text $selectedOptions
     */
    public function setSelectedOptions($selectedOptions)
    {
        $this->selectedOptions = $selectedOptions;
    }

    /**
     * Get selectedOptions
     *
     * @return text 
     */
    public function getSelectedOptions()
    {
        return $this->selectedOptions;
    }

    /**
     * Set selectedOptionLabels
     *
     * @param text $selectedOptionLabels
     */
    public function setSelectedOptionLabels($selectedOptionLabels)
    {
        $this->selectedOptionLabels = $selectedOptionLabels;
    }

    /**
     * Get selectedOptionLabels
     *
     * @return text 
     */
    public function getSelectedOptionLabels()
    {
        return $this->selectedOptionLabels;
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
}