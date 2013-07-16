<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\Basket\BasketType;
use KAC\SiteBundle\Form\Basket\NewBasketItemType;
use KAC\SiteBundle\Form\Checkout\AboutType;
use KAC\SiteBundle\Form\Checkout\AboutYouType;
use KAC\SiteBundle\Form\Checkout\BillingAddressType;
use KAC\SiteBundle\Form\Checkout\CheckoutFlow;
use KAC\SiteBundle\Form\Checkout\ConfirmationType;
use KAC\SiteBundle\Form\Checkout\DeliveryAddressType;
use KAC\SiteBundle\Form\Checkout\DeliveryType;
use KAC\SiteBundle\Form\Checkout\PaymentType;
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

/**
 * @Route("/")
 */
class CheckoutController extends Controller
{
    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout.html", name="checkout")
     */
    public function checkoutAction(Request $request)
    {
        $manager = $this->get('kac_site.manager.order');

        // Create new order
        $order = $manager->getOpenOrder();

        switch($order->getCurrentStep()) {
            case 'About':
                return $this->redirect($this->generateUrl('checkout_about'));
            case 'Billing':
                return $this->redirect($this->generateUrl('checkout_billing'));
            case 'Delivery':
                return $this->redirect($this->generateUrl('checkout_delivery'));
            case 'Payment':
                return $this->redirect($this->generateUrl('checkout_payment'));
            case 'Confirmation':
                return $this->redirect($this->generateUrl('checkout_confirmation'));
            default:
                $manager->deleteOrder();
                return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-about.html", name="checkout_about")
     */
    public function checkoutAboutAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOpenOrder();
        $basket = $manager->getBasket();

        // Ensure that the basket has more than 1 item
        if($basket->getTotalItems() === 0)
        {
            $manager->deleteOrder();
            return $this->redirect($this->generateUrl('homepage'));
        }
        // Check order status
        if(!in_array($order->getCurrentStep(), array('About', 'Billing', 'Delivery', 'Payment', 'Confirmation')))
        {
            return $this->checkoutAction($request);
        }

        // Skip this step if the user has already registered before and has entered the required information
        if($order->getUser() && !!$order->getUser()->getContact() && !!$order->getUser()->getContact()->getTelephoneDaytime())
        {
            // Update order status
            $manager->updateCheckoutStep($order, 'Billing');
            $manager->saveOrder();

            return $this->redirect($this->generateUrl('checkout_billing'));
        }

        $form = $this->createForm(new AboutType($basket->getDelivery()->getDeliveryOptions()), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {
            if ($form->get('updateDelivery')->isClicked()) {
                $manager->updateDeliveryInfo($order, $basket);
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_about'));
            } else {
                // Update order status
                $manager->updateCheckoutStep($order, 'Billing');
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_billing'));
            }
        }

        return $this->render('KACSiteBundle:Checkout:checkout_about.html.twig', array(
            'order' => $order,
            'basket' => $basket,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-billing.html", name="checkout_billing")
     */
    public function checkoutBillingAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOpenOrder();
        $basket = $manager->getBasket();

        // Ensure that the basket has more than 1 item
        if($basket->getTotalItems() === 0)
        {
            $manager->deleteOrder();
            return $this->redirect($this->generateUrl('homepage'));
        }
        // Check order status
        if(!in_array($order->getCurrentStep(), array('Billing', 'Delivery', 'Payment', 'Confirmation')))
        {
            return $this->checkoutAction($request);
        }

        $form = $this->createForm(new BillingAddressType($basket->getDelivery()->getDeliveryOptions()), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {
            // If useBillingAsDelivery is set then update the delivery address
            if($order->getUseBillingAsDelivery())
            {
                $order->setDeliveryFirstName($order->getBillingFirstName());
                $order->setDeliveryLastName($order->getBillingLastName());
                $order->setDeliveryOrganisationName($order->getBillingOrganisationName());
                $order->setDeliveryAddressLine1($order->getBillingAddressLine1());
                $order->setDeliveryAddressLine2($order->getBillingAddressLine2());
                $order->setDeliveryTownCity($order->getBillingTownCity());
                $order->setDeliveryCountyState($order->getBillingCountyState());
                $order->setDeliveryPostZipCode($order->getBillingPostZipCode());
                $order->setDeliveryCountryCode($order->getBillingCountryCode());
            }

            if ($form->get('updateDelivery')->isClicked()) {
                $manager->updateDeliveryInfo($order, $basket);
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_billing'));
            } else {
                // Skip this step if the user has selected to use billing address as delivery address
                if($order->getUseBillingAsDelivery())
                {
                    // Update order status
                    $manager->updateCheckoutStep($order, 'Payment');
                    $manager->saveOrder();

                    return $this->redirect($this->generateUrl('checkout_payment'));
                } else {
                    // Update order status
                    $manager->updateCheckoutStep($order, 'Delivery');
                    $manager->saveOrder();

                    return $this->redirect($this->generateUrl('checkout_delivery'));
                }
            }
        }

        return $this->render('KACSiteBundle:Checkout:checkout_billing.html.twig', array(
            'order' => $order,
            'basket' => $basket,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-delivery.html", name="checkout_delivery")
     */
    public function checkoutDeliveryAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOrder();
        $basket = $manager->getBasket();

        // Ensure that the basket has more than 1 item
        if($basket->getTotalItems() === 0)
        {
            $manager->deleteOrder();
            return $this->redirect($this->generateUrl('homepage'));
        }
        // Check order status
        if(!in_array($order->getCurrentStep(), array('Delivery', 'Payment', 'Confirmation')))
        {
            return $this->checkoutAction($request);
        }

        // Skip this step if the user has selected to use billing address as delivery address
        if($order->getUseBillingAsDelivery())
        {
            // Update order status
            $manager->updateCheckoutStep($order, 'Payment');
            $manager->saveOrder();

            return $this->redirect($this->generateUrl('checkout_payment'));
        }


        $form = $this->createForm(new DeliveryAddressType($basket->getDelivery()->getDeliveryOptions()), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {
            if ($form->get('updateDelivery')->isClicked()) {
                $manager->updateDeliveryInfo($order, $basket);
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_delivery'));
            } else {
                // Update order status
                $manager->updateCheckoutStep($order, 'Payment');
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_payment'));
            }
        }

        return $this->render('KACSiteBundle:Checkout:checkout_delivery.html.twig', array(
            'order' => $order,
            'basket' => $basket,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-payment.html", name="checkout_payment")
     */
    public function checkoutPaymentAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOrder();
        $basket = $manager->getBasket();

        // Ensure that the basket has more than 1 item
        if($basket->getTotalItems() === 0)
        {
            $manager->deleteOrder();
            return $this->redirect($this->generateUrl('homepage'));
        }
        // Check order status
        if(!in_array($order->getCurrentStep(), array('Payment', 'Confirmation')))
        {
            return $this->checkoutAction($request);
        }

        $form = $this->createForm(new PaymentType($basket->getDelivery()->getDeliveryOptions()), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {

            // Update cc details if needed
            if($order->getPaymentType() === 'card')
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

            if ($form->get('updateDelivery')->isClicked()) {
                $manager->updateDeliveryInfo($order, $basket);
                $manager->saveOrder();

                return $this->redirect($this->generateUrl('checkout_payment'));
            } else {
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
                    'cancelUrl' => $this->generateUrl('checkout_billing', array(), true),
                )));
                try {
                    $paymentResponse = $paymentRequest->send();
                } catch (\Exception $e) {
                    $paymentResponse = null;
                }

                // Update order status and redirect if needed
                if($paymentResponse === null)
                {
                    $order->setStatus('Payment Failed');
                    $order->setAuthResponse($paymentResponse);
                    $manager->saveOrder();

                    $form->addError(new FormError('There was an error processing your payment, please try again later.'));
                } elseif ($paymentResponse->isSuccessful()) {
                    $manager->updateCheckoutStep($order, 'Confirmation');
                    $order->setStatus('Open Payment');
                    $order->setAuthResponse($paymentResponse);
                    $manager->saveOrder();

                    return $this->redirect($this->generateUrl('checkout_confirmation'));
                } elseif ($paymentResponse->isRedirect()) {
                    $manager->updateCheckoutStep($order, 'Confirmation');
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
        }

        return $this->render('KACSiteBundle:Checkout:checkout_payment.html.twig', array(
            'order' => $order,
            'basket' => $basket,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-confirm.html", name="checkout_confirmation")
     */
    public function checkoutConfirmationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOrder();
        $basket = $manager->getBasket();

        // Ensure that the basket has more than 1 item
        if($basket->getTotalItems() === 0)
        {
            $manager->deleteOrder();
            return $this->redirect($this->generateUrl('homepage'));
        }
        // Check order status
        if(!in_array($order->getCurrentStep(), array('Confirmation')))
        {
            return $this->checkoutAction($request);
        }

        // Fetch user
        $user = $this->get('security.context')->getToken()->getUser();
        $order->setUser($user);

        $form = $this->createForm(new ConfirmationType(), $order);
        $form->handleRequest($request);

        if($form->isValid())
        {
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

            // Update order status and redirect if needed
            if($paymentResponse === null)
            {
                $order->setStatus('Payment Received');
                $order->setPaymentResponse($paymentResponse);
                $manager->saveOrder();

                $form->addError(new FormError('There was an error processing your payment, please try again later.'));
            } elseif ($paymentResponse->isSuccessful()) {
                $manager->updateCheckoutStep($order, 'Complete');
                $order->setStatus('Payment Received');
                $order->setPaymentResponse($paymentResponse);
                $manager->saveOrder();

                // Clear the baskets
                $manager->clearBasket();

                return $this->redirect($this->generateUrl('checkout_complete'));
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
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-complete.html", name="checkout_complete")
     */
    public function checkoutCompleteAction(Request $request)
    {
        $manager = $this->get('kac_site.manager.order');

        // Get order
        $order = $manager->getOrder();

        return $this->render('KACSiteBundle:Checkout:checkout_complete.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
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
     * @Secure(roles="ROLE_USER")
     * @Route("/checkout-refresh.html", name="checkout_refresh")
     */
    public function checkoutRefreshAction(Request $request)
    {
        $manager = $this->get('kac_site.manager.order');
        $manager->updateBasket();

        return $this->redirect($request->query->has('url') ? $request->query->get('url') : $this->generateUrl('checkout'));
    }
}
