<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\Basket\BasketType;
use KAC\SiteBundle\Form\Basket\NewBasketItemType;
use KAC\SiteBundle\Form\Checkout\CheckoutFlow;
use KAC\SiteBundle\Model\BasketItem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $order = $manager->createOrder();

        // Bind basket data to order


        $flow = $this->get('kac_site.form.flow.checkout');
        $flow->bind($order);

        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                $em = $this->getDoctrine()->getManager();
                $em->persist($order);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('homepage'));
            }
        }

        return $this->render('KACSiteBundle:Checkout:checkout.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }
}
