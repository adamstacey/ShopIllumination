<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="keyword_suggestions")
 * @ORM\HasLifecycleCallbacks()
 */
class KeywordSuggestion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
	/**
     * @ORM\Column(name="keyword_phrase", type="string", length=255)
     */
    private $keywordPhrase;
    
    /**
     * @ORM\Column(name="data", type="text")
     */
    private $data;

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