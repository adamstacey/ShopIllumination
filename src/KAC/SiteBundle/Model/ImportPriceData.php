<?php
namespace KAC\SiteBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class ImportPriceData
{
    /**
     * @Assert\Choice(choices = {"check", "update"}, message = "Choose a valid action.")
     */
    private $action;
    private $rrp;
    /**
     * @Assert\NotNull(message="Please upload a valid file")
     * @Assert\File(
     *     mimeTypes = {"text/csv", "text/plain"},
     *     mimeTypesMessage = "Please upload a valid file"
     * )
     */
    private $file;
    private $confirmation = false;

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $rrp
     */
    public function setRrp($rrp)
    {
        $this->rrp = $rrp;
    }

    /**
     * @return mixed
     */
    public function getRrp()
    {
        return $this->rrp;
    }

    /**
     * @param boolean $confirmation
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;
    }

    /**
     * @return boolean
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }
}