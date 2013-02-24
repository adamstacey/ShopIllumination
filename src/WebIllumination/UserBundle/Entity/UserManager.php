<?php
namespace WebIllumination\UserBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Doctrine\UserManager as BaseUserManager;
use FOS\UserBundle\Util\CanonicalizerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use WebIllumination\SiteBundle\Entity\Contact;

class UserManager extends BaseUserManager
{
    /**
     * Returns an empty user instance
     *
     * @return UserInterface
     */
    public function createUser()
    {
        $class = $this->getClass();
        $user = new $class;

        // Add blank contact to user
//        $contact = new Contact();
//        $user->setContact($contact);

        return $user;
    }
}
