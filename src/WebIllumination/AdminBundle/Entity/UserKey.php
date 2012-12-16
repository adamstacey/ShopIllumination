<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_keys")
 * @ORM\HasLifecycleCallbacks()
 */
class UserKey
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="user_id", type="integer", length=11)
     */
    private $userId;
	
	/**
     * @ORM\Column(name="user_key", type="string", length=50)
     */
    private $userKey;
                
    /**
     * @ORM\Column(name="expiry", type="datetime")
     */
    private $expiry;

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
	 * @ORM\PrePersist
	 */
	public function create()
	{
		$expiry = date("Y-m-d H:i:s", strtotime('+1 day'));
	    $this->expiry = new \DateTime($expiry);
	}
	
	/**
	 * @ORM\PreUpdate
	 */
    public function update()
    {
    	$expiry = date("Y-m-d H:i:s", strtotime('+1 day'));
    }
}