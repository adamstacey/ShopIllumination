<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @ORM\Entity
 * @ORM\Table(name="documents")
 * @ORM\HasLifecycleCallbacks()
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="object_type", type="string", length=100, nullable=true)
     */
    private $objectType;

    /**
     * @ORM\Column(name="object_id", type="integer", length=11, nullable=true)
     */
    private $objectId;

    /**
     * @ORM\Column(name="document_type", type="string", length=100, nullable=true)
     */
    private $documentType;

    /**
     * @ORM\Column(name="locale", type="string", length=5)
     */
    private $locale = "en_GB";

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="file_extension", type="string", length=20, nullable=true)
     */
    private $fileExtension;

    /**
     * @ORM\Column(name="file_size", type="integer", length=11, nullable=true)
     */
    private $fileSize;

    /**
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder = 0;

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
     * @var UploadedFile
     * @Assert\NotNull
     * @Assert\File(maxSize="5000000")
     */
    private $file = null;
    private $filesForRemoval = array();

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
     * Set objectType
     *
     * @param string $objectType
     * @return Document
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * Get objectType
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * Set objectId
     *
     * @param integer $objectId
     * @return Document
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set documentType
     *
     * @param string $documentType
     * @return Document
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get documentType
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Document
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Document
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fileExtension
     *
     * @param string $fileExtension
     * @return Document
     */
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Get fileExtension
     *
     * @return string
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     * @return Document
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Document
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Document
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;

        return $this;
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
     * @param \DateTime $createdAt
     * @return Document
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
     * @return Document
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
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    public function preUpload()
    {
        if (null !== $this->file)
        {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $this->getUploadDir().'/'.$filename.'.'.$this->file->guessExtension();
        }
    }

    public function upload()
    {
        if (null === $this->file)
        {
            return;
        }
        $this->file->move($this->getUploadPath().$this->getUploadDir(), basename($this->path));
        $this->file = null;
    }

    public function storeFilenameForRemove()
    {
        $this->filesForRemoval = array();
        $this->filesForRemoval[] = $this->getUploadPath().'/'.$this->getPath();
        if ($this->getPath() !== null)
        {
            $this->filesForRemoval[] = $this->getUploadPath().'/'.$this->getPath();
        }
    }

    public function removeUpload()
    {
        foreach ($this->filesForRemoval as $fileForRemoval)
        {
            unlink($fileForRemoval);
        }
    }

    public function getUploadPath()
    {
        return __DIR__.'/../../../../web';
    }

    public function getUploadDir()
    {
        return '/uploads/documents';
    }
}