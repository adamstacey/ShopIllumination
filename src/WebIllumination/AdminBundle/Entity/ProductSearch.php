<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_search")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductSearch
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="search_phrase", type="string", length=255)
     */
    private $searchPhrase;
	    
    /**
     * @ORM\Column(name="product_data", type="text")
     */
    private $productData;
            
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

	/**
	 * @ORM\PrePersist
	 */
	private function create()
	{
	    $this->createdAt = new \DateTime();
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
     * Set searchPhrase
     *
     * @param string $searchPhrase
     */
    public function setSearchPhrase($searchPhrase)
    {
        $this->searchPhrase = $searchPhrase;
    }

    /**
     * Get searchPhrase
     *
     * @return string 
     */
    public function getSearchPhrase()
    {
        return $this->searchPhrase;
    }

    /**
     * Set productData
     *
     * @param text $productData
     */
    public function setProductData($productData)
    {
        $this->productData = $productData;
    }

    /**
     * Get productData
     *
     * @return text 
     */
    public function getProductData()
    {
        return $this->productData;
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
}