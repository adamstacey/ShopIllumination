<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Entity\Contact;
use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\Basket\BasketType;
use KAC\SiteBundle\Form\Basket\NewBasketItemType;
use KAC\SiteBundle\Form\Checkout\AboutType;
use KAC\SiteBundle\Form\Checkout\AboutYouType;
use KAC\SiteBundle\Form\Checkout\AddressType;
use KAC\SiteBundle\Form\Checkout\BillingAddressType;
use KAC\SiteBundle\Form\Checkout\CheckoutFlow;
use KAC\SiteBundle\Form\Checkout\CheckoutType;
use KAC\SiteBundle\Form\Checkout\ConfirmationType;
use KAC\SiteBundle\Form\Checkout\DeliveryAddressType;
use KAC\SiteBundle\Form\Checkout\DeliveryType;
use KAC\SiteBundle\Form\Checkout\PaymentType;
use KAC\SiteBundle\Form\Checkout\PaymentTypeType;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;
use KAC\SiteBundle\Model\BasketItem;
use KAC\UserBundle\Entity\User;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\CreditCard;
use Omnipay\Common\GatewayFactory;
use Omnipay\PayPal\ExpressGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\PayPal\ProGateway;
use Omnipay\SagePay\DirectGateway;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/")
 */
class CheckoutController extends Controller
{
    /**
     * @Route("/checkout.html", name="checkout")
     */
    public function checkoutAboutAction(Request $request)
    {
        // Check if the user is logged in or if the user is trying to checkout as guest
        if(!$request->query->get('guest') && !$this->get('security.context')->isGranted('ROLE_USER'))
        {
            return $this->redirectToLogin();
        }

        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');
        $userManager = $this->container->get('fos_user.user_manager');
        $deliveryManager = $this->container->get('kac_site.manager.delivery');

        // Get order
        $order = $manager->getOpenOrder();
        $basket = $manager->getBasket();

        // Skip this step if the user has already registered before and has entered the required information
        if(!$order->getUser() && $this->get('security.context')->getToken()->getUser())
        {
            $order->setUser($this->get('security.context')->getToken()->getUser());
        }

        // Get the available delivery options
        $zone = $deliveryManager->calculateZone($order->getDeliveryCountryCode(), $order->getDeliveryPostZipCode());
        $band = $deliveryManager->calculateBand($order->getProducts());
        $methods = DeliveryFactory::getMethods($zone, $band);
        if ((!$order->getDeliveryType() || !$order->getDeliveryTypeObject()->supportsLocation($zone, $band)) && count($methods) > 0) {
            $order->setDeliveryType($methods[0]->getName());
        }

        $form = $this->createForm(new CheckoutType($this->get('kac_site.manager.delivery')), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {
            // If user is guest create a new account with the given email address
            if(!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') && $request->query->get('guest', true))
            {
                $user = $userManager->createUser();
                $user->setUsername($order->getEmailAddress());
                $user->setEmail($order->getEmailAddress());
                $user->setPlainPassword('password');
                $user->setEnabled(false);
                $user->setSuperAdmin(false);
                $user->setRoles(array('ROLE_GUEST'));
                $user->setType('guest');

                $contact = new Contact();
                if($order->getTelephoneDaytime()) {
                    $contact->setTelephoneDaytime(new Contact\Number($order->getTelephoneDaytime()));
                }
                if($order->getTelephoneEvening()) {
                    $contact->setTelephoneEvening(new Contact\Number($order->getTelephoneDaytime()));
                }
                if($order->getMobile()) {
                    $contact->setTelephoneMobile(new Contact\Number($order->getTelephoneDaytime()));
                }
                $user->setContact($contact);
                $userManager->updateUser($user);
                $order->setUser($user);

                $token = new UsernamePasswordToken($user, $user->getPassword(), 'checkout', $user->getRoles());

                $context = $this->container->get('security.context');
                $context->setToken($token);
            }

            $order->setFirstName($order->getBillingFirstName());
            $order->setLastName($order->getBillingLastName());
            $order->setOrganisationName($order->getBillingOrganisationName());

            // Update cc details if needed
            if($order->getPaymentType() === 'sagepay')
            {
                $order->getCard()->setBillingFirstName($order->getBillingFirstName());
                $order->getCard()->setBillingLastName($order->getBillingLastName());
                $order->getCard()->setBillingCompany($order->getBillingOrganisationName());
                $order->getCard()->setBillingAddress1($order->getBillingAddressLine1());
                $order->getCard()->setBillingAddress2($order->getBillingAddressLine2());
                $order->getCard()->setBillingCity($order->getBillingTownCity());
                $order->getCard()->setBillingState($order->getBillingCountyState());
                $order->getCard()->setBillingPostCode($order->getBillingPostZipCode());
                $order->getCard()->setBillingCountry($order->getBillingCountryCode());
                $order->getCard()->setShippingFirstName($order->getDeliveryFirstName());
                $order->getCard()->setShippingLastName($order->getDeliveryLastName());
                $order->getCard()->setShippingCompany($order->getDeliveryOrganisationName());
                $order->getCard()->setShippingAddress1($order->getDeliveryAddressLine1());
                $order->getCard()->setShippingAddress2($order->getDeliveryAddressLine2());
                $order->getCard()->setShippingCity($order->getDeliveryTownCity());
                $order->getCard()->setShippingState($order->getDeliveryCountyState());
                $order->getCard()->setShippingPostCode($order->getDeliveryPostZipCode());
                $order->getCard()->setShippingCountry($order->getDeliveryCountryCode());
            }

            // Recalculate the order totals
            $manager->updateDeliveryInfo($order);
            $manager->updateProductInfo($order);

            $paymentResponse = $this->authorizePayment($order);

            // Update order status and redirect if needed
            if($paymentResponse === null)
            {
                $order->setStatus('Payment Failed');
                $order->setAuthResponse($paymentResponse);
                $manager->saveOrder();

                $form->addError(new FormError('There was an error processing your payment, please try again later.'));
            } elseif ($paymentResponse->isSuccessful()) {
                $order->setStatus('Open Payment');
                $order->setAuthResponse($paymentResponse);
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_confirmation'));
            } elseif ($paymentResponse->isRedirect()) {
                $order->setStatus('Open Payment');
                $order->setAuthResponse($paymentResponse);
                $manager->saveOrder();

                return new RedirectResponse($paymentResponse->getRedirectUrl());
            } else {
                $order->setStatus('Payment Failed');
                $order->setAuthResponse($paymentResponse);
                $manager->saveOrder();

                $form->addError(new FormError($paymentResponse->getMessage()));
            }
        }

        return $this->render('KACSiteBundle:Checkout:checkout.html.twig', array(
            'order' => $order,
            'basket' => $basket,
            'form' => $form->createView(),
            'methods' => $methods,
        ));
    }

    /**
     * @Route("/checkout-delivery-options.html", name="checkout_delivery_options")
     */
    public function deliveryOptionsAction(Request $request, $form=null, $country=null, $postcode=null)
    {
        // Check if the user is logged in or if the user is trying to checkout as guest
        if(!$request->query->get('guest') && !$this->get('security.context')->isGranted('ROLE_USER'))
        {
            return $this->redirectToLogin();
        }

        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');
        $userManager = $this->container->get('fos_user.user_manager');
        $deliveryManager = $this->container->get('kac_site.manager.delivery');

        // Get order
        $order = $manager->getOpenOrder();
        $basket = $manager->getBasket();

        // Skip this step if the user has already registered before and has entered the required information
        if(!$order->getUser() && $this->get('security.context')->getToken()->getUser())
        {
            $order->setUser($this->get('security.context')->getToken()->getUser());
        }

        // Get the available delivery options
        if(!$country) $country = $request->query->get('country');
        if(!$postcode) $postcode = $request->query->get('postcode');

        $order->setDeliveryCountryCode($country);
        $order->setDeliveryPostZipCode($postcode);

        $zone = $deliveryManager->calculateZone($order->getDeliveryCountryCode(), $order->getDeliveryPostZipCode());
        $band = $deliveryManager->calculateBand($order->getProducts());
        $methods = DeliveryFactory::getMethods($zone, $band);
        if ((!$order->getDeliveryType() || !$order->getDeliveryTypeObject()->supportsLocation($zone, $band)) && count($methods) > 0) {
            $order->setDeliveryType($methods[0]->getName());
        }

        if(!$form) $form = $this->createForm(new CheckoutType($this->get('kac_site.manager.delivery')), $order);

        return $this->render('KACSiteBundle:Checkout:deliveryOptions.html.twig', array(
            'order' => $order,
            'basket' => $basket,
            'form' => $form->createView(),
            'methods' => $methods,
        ));
    }

    /**
     * @Route("/checkout-confirm.html", name="checkout_confirmation")
     */
    public function checkoutConfirmationAction(Request $request)
    {
        // Check if the user is logged in and has the correct permissions
        if(!$this->get('security.context')->isGranted(array('ROLE_GUEST', 'ROLE_USER')))
        {
            return $this->redirectToLogin();
        }

        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOrder();
        $basket = $manager->getBasket();

        // Fetch user
        $user = $this->get('security.context')->getToken()->getUser();
        $order->setUser($user);

        $form = $this->createForm(new ConfirmationType(), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {
            // Remove note if it is blank
            if($order->getNotes()[0]->getNote() === '')
            {
                $order->removeNote($order->getNotes()[0]);
            }

            $paymentResponse = $this->completePayment($order);

            // Update order status and redirect if needed
            if($paymentResponse === null)
            {
                $order->setStatus('Payment Failed');
                $order->setPaymentResponse($paymentResponse);
                $manager->saveOrder();

                $form->addError(new FormError('There was an error processing your payment, please try again later.'));
            } elseif ($paymentResponse->isSuccessful()) {
                $order->setStatus('Payment Received');
                $order->setPaymentResponse($paymentResponse);
                $order->setCreatedAt(new \DateTime());
                $manager->saveOrder();

                // Send order confirmation email
                try
                {
                    $generator = $this->get('kac_site.manager.order_document_generator');
                    $attachment = $generator->generateSingleDocument('invoice', $order);

                    $email = \Swift_Message::newInstance();
                    $email->setSubject('Your Order with Kitchen Appliance Centre: '.$order['orderNumber']);
                    $email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
                    $email->setTo(array($order['emailAddress'] => $order['firstName'].' '.$order['lastName']));
                    $email->setBody($this->renderView('KACSiteBundle:Order/Email:invoice.html.twig', array('order' => $order)), 'text/html');
                    $email->addPart($this->renderView('KACSiteBundle:Order/Email:invoice.txt.twig', array('order' => $order)), 'text/plain');
                    if (file_exists($attachment))
                    {
                        $email->attach(\Swift_Attachment::fromPath($attachment)->setFilename('kitchen-appliance-centre-invoice-'.$order->getId().'.pdf'));
                    }
                    $this->get('mailer')->send($email);
                } catch (\Exception $exception) {
                    error_log('Error sending invoice email!');
                }

                // Clear the baskets
                $manager->clearBasket();
                $manager->finishOrder();

                return $this->redirect($this->generateUrl('checkout_complete', array(
                    'id' => $order->getId(),
                )));
            } else {
                $order->setStatus('Payment Failed');
                $order->setPaymentResponse($paymentResponse);
                $manager->saveOrder();

                $form->addError(new FormError($paymentResponse->getMessage()));
            }
        }

        return $this->render('KACSiteBundle:Checkout:checkout_confirmation.html.twig', array(
            'order' => $order,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/checkout-complete.html", name="checkout_complete")
     */
    public function checkoutCompleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Check if the user is logged in and has the correct permissions
        if(!$this->get('security.context')->isGranted(array('ROLE_GUEST', 'ROLE_USER')))
        {
            return $this->redirectToLogin();
        }
        if(!$request->query->get('id') || false === $order = $em->getRepository('KACSiteBundle:Order')->find($request->query->get('id')))
        {
            throw $this->createNotFoundException();
        }

        return $this->render('KACSiteBundle:Checkout:checkout_complete.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Route("/checkout-cancel.html", name="checkout_cancel")
     */
    public function checkoutCancelAction(Request $request)
    {
        $manager = $this->get('kac_site.manager.order');

        // Delete order
        $manager->getOpenOrder();
        $manager->deleteOrder();

        return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/checkout-refresh.html", name="checkout_refresh")
     */
    public function checkoutRefreshAction(Request $request)
    {
        $manager = $this->get('kac_site.manager.order');
        $manager->updateBasket();

        return $this->redirect($request->query->has('url') ? $request->query->get('url') : $this->generateUrl('checkout'));
    }

    protected function redirectToLogin()
    {
        $this->getRequest()->getSession()->set('_security.main.target_path', $this->getRequest()->getUri());

        return new RedirectResponse($this->generateUrl('checkout_login'));
    }

    protected function authorizePayment($order)
    {
        $manager = $this->get('kac_site.manager.order');

        $data = array();
        foreach($order->getProducts() as $item)
        {
            $product = array();
            $product['name'] = $item->getHeader();
            $product['productCode'] = $item->getProductCode();
            $product['description'] = $item->getDescription();
            $product['unitCost'] = number_format($item->getUnitCost(), 2, '.', '');
            $product["quantity"] = $item->getQuantity();
            $data['products'][] = $product;
        }

        $data["subTotal"] = number_format($order->getSubTotal(), 2, '.', '');
        $data["deliveryCharge"] = number_format($order->getDeliveryCharge(), 2, '.', '');
        /**
         * Authorize payment
         * @var $gateway AbstractGateway
         * @var $paymentRequest AbstractRequest
         */
        $gateway = $this->get('kac_site.payment.' . $order->getPaymentType());
        $paymentRequest = $gateway->authorize(array_merge($data, array(
            'transactionId' => $order->getId(),
            'card' => $order->getPaymentType() === 'sagepay' ? $order->getCard() : null,
            'amount' => number_format($order->getTotal(), 2, '.', ''),
            'currency' => 'GBP',
            'returnUrl' => $this->generateUrl('checkout_confirmation', array(), true),
            'cancelUrl' => $this->generateUrl('checkout', array(), true),
        )));

        try {
            $paymentResponse = $paymentRequest->send();
        } catch (\Exception $e) {
            $paymentResponse = null;
        }

        return $paymentResponse;
    }

    protected function completePayment($order)
    {
        $manager = $this->get('kac_site.manager.order');

        /**
         * Confirm payment
         * @var $gateway AbstractGateway
         * @var $paymentRequest AbstractRequest
         */
        $gateway = $this->get('kac_site.payment.' . $order->getPaymentType());
        $paymentRequest = $gateway->completePurchase(array(
            'transactionId' => $order->getId(),
            'card' => $order->getPaymentType() === 'card' ? $order->getCard() : null,
            'amount' => number_format($order->getTotal(), 2, '.', ''),
            'currency' => 'GBP',
        ));
        try {
            $paymentResponse = $paymentRequest->send();
        } catch (\Exception $e) {
            $paymentResponse = null;
        }

        return $paymentResponse;
    }
}
