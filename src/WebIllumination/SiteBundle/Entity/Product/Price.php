<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_prices")
 * @ORM\HasLifecycleCallbacks()
 */
class Price
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Variant", inversedBy="prices")
     */
    private $variant;
    
    /**
     * @ORM\Column(name="supplier_id", type="integer", length=11, nullable=true)
     */
    private $supplierId = 0;
    
    /**
     * @ORM\Column(name="cost_price", type="decimal", precision=12, scale=4)
     */
    private $costPrice;
    
    /**
     * @ORM\Column(name="recommended_retail_price", type="decimal", precision=12, scale=4)
     */
    private $recommendedRetailPrice;
    
    /**
     * @ORM\Column(name="list_price", type="decimal", precision=12, scale=4)
     */
    private $listPrice;
    
    /**
     * @ORM\Column(name="currency_code", type="string", length=3)
     */
    private $currencyCode = 'GBP';
    
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
     * Set supplierId
     *
     * @param integer $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    /**
     * Get supplierId
     *
     * @return integer 
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * Set costPrice
     *
     * @param decimal $costPrice
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
    }

    /**
     * Get costPrice
     *
     * @return decimal 
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }
    
    /**
     * Get costPriceExcludingVat
     *
     * @return decimal 
     */
    public function getCostPriceExcludingVat()
    {
        return ($this->costPrice / 1.2);
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
     * Get recommendedRetailPriceExcludingVat
     *
     * @return decimal 
     */
    public function getRecommendedRetailPriceExcludingVat()
    {
        return ($this->recommendedRetailPrice / 1.2);
    }

    /**
     * Set listPrice
     *
     * @param decimal $listPrice
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
    }

    /**
     * Get listPrice
     *
     * @return decimal 
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }
    
    /**
     * Get listPriceExcludingVat
     *
     * @return decimal 
     */
    public function getListPriceExcludingVat()
    {
        return ($this->listPrice / 1.2);
    }
    
    /**
     * Get profit
     *
     * @return decimal 
     */
    public function getProfit()
    {
        return ($this->listPrice - $this->costPrice);
    }
    
    /**
     * Get profitExcludingVat
     *
     * @return decimal 
     */
    public function getProfitExcludingVat()
    {
        return ($this->getProfit() / 1.2);
    }
    
    /**
     * Get profitPercentage
     *
     * @return decimal 
     */
    public function getProfitPercentage()
    {
    	if ($this->listPrice > 0)
    	{
        	return ((1 - ($this->costPrice / $this->listPrice)) * 100);
        }
        return 0;
    }
    
    /**
     * Get profitPercentageClass
     *
     * @return string 
     */
    public function getProfitPercentageClass()
    {
    	if ($this->getProfitPercentage() >= 20)
    	{
    		return 'ui-state-success';
    	} else if (($this->getProfitPercentage() < 20) && ($this->getProfitPercentage() >= 10)) {
    		return 'ui-state-highlight';
    	} else {
    		return 'ui-state-error';
    	}
    }
    
    /**
     * Get markupPercentage
     *
     * @return decimal 
     */
    public function getMarkupPercentage()
    {
    	if ($this->costPrice > 0)
    	{
    		return (($this->getProfit() / $this->costPrice) * 100);
    	}
        return 100;
    }
    
    /**
     * Get markupPercentageClass
     *
     * @return string 
     */
    public function getMarkupPercentageClass()
    {
    	if ($this->getMarkupPercentage() >= 20)
    	{
    		return 'ui-state-success';
    	} else if (($this->getMarkupPercentage() < 20) && ($this->getMarkupPercentage() >= 10)) {
    		return 'ui-state-highlight';
    	} else {
    		return 'ui-state-error';
    	}
    }
    
    /**
     * Get discount
     *
     * @return string 
     */
    public function getDiscount()
    {
    	if ($this->recommendedRetailPrice > 0)
    	{
    		return (1 - ($this->listPrice / $this->recommendedRetailPrice)) * 100;
    	} else {
    		return 0;
    	}
    }

    /**
     * Get savings
     *
     * @return string
     */
    public function getSavings()
    {
    	return $this->recommendedRetailPrice - $this->listPrice;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
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
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variant
     * @return Price
     */
    public function setVariant(\WebIllumination\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \WebIllumination\SiteBundle\Entity\Product 
     */
    public function getVariant()
    {
        return $this->variant;
    }
}