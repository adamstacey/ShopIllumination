<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="crawl_errors")
 * @ORM\HasLifecycleCallbacks()
 */
class CrawlError
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="url", type="text")
     */
    private $url;
    
    /**
     * @ORM\Column(name="response_code", type="integer", length=5)
     */
    private $responseCode;
	
	/**
     * @ORM\Column(name="actioned", type="boolean")
     */
    private $actioned;

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
     * Set url
     *
     * @param string $url
     * @return CrawlError
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
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
     * Set responseCode
     *
     * @param integer $responseCode
     * @return CrawlError
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    
        return $this;
    }

    /**
     * Get responseCode
     *
     * @return integer 
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Set actioned
     *
     * @param boolean $actioned
     * @return CrawlError
     */
    public function setActioned($actioned)
    {
        $this->actioned = $actioned;
    
        return $this;
    }

    /**
     * Get actioned
     *
     * @return boolean 
     */
    public function getActioned()
    {
        return $this->actioned;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CrawlError
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
     * @return CrawlError
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
}