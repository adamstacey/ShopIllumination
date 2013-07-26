<?php
namespace KAC\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CheckoutSecurityController extends SecurityController
{
    /**
     * @inheritdoc
     * @Route("/checkout/login", name="checkout_login")
     */
    public function loginAction(Request $request)
    {
        return parent::loginAction($request);
    }

    /**
     * @inheritdoc
     * @Route("/checkout/login_check", name="checkout_login_check")
     */
    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    /**
     * @inheritdoc
     */
    protected function renderLogin(array $data)
    {
        $template = sprintf('FOSUserBundle:CheckoutSecurity:login.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }
}