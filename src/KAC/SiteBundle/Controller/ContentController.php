<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContentController extends Controller
{
    /**
     * @Route("/cookie-policy.html", name="content_cookie_policy")
     */
    public function cookiePolicyAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:cookiePolicy.html.twig', array());
    }

    /**
     * @Route("/useful-links.html", name="content_useful_links")
     */
    public function usefulLinksAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:usefulLinks.html.twig', array());
    }

    /**
     * @Route("/installation-guides.html", name="content_installation_guides")
     */
    public function installationGuidesAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:installationGuides.html.twig', array());
    }

    /**
     * @Route("/what-is-my-water-pressure.html", name="content_water_pressure_information")
     */
    public function waterPressureInformationAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:waterPressureInformation.html.twig', array());
    }

    /**
     * @Route("/returns-policy.html", name="content_returns")
     */
    public function returnsAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:returns.html.twig', array());
    }

    /**
     * @Route("/privacy-policy.html", name="content_privacy_policy")
     */
    public function privacyPolicyAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:privacyPolicy.html.twig', array());
    }

    /**
     * @Route("/terms-and-conditions.html", name="content_terms_and_conditions")
     */
    public function termsAndConditionsAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:termsAndConditions.html.twig', array());
    }

    /**
     * @Route("/delivery.html", name="content_delivery")
     */
    public function deliveryAction(Request $request)
    {
        // Get the basket
        $basket = $this->get('session')->get('basket');

        return $this->render('KACSiteBundle:Content:delivery.html.twig', array('basket' => $basket));
    }

    /**
     * @Route("/security.html", name="content_security")
     */
    public function securityAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:security.html.twig', array());
    }

    /**
     * @Route("/fraud-prevention.html", name="content_fraud_prevention")
     */
    public function fraudPreventionAction(Request $request)
    {
        return $this->render('KACSiteBundle:Content:fraudPrevention.html.twig', array());
    }

    /**
     * @Route("/visit-us.html", name="content_the_shop")
     * @Route("/visit-the-kitchen-appliance-centre-showroom-in-nottingham.html", name="content_the_shop_long")
     */
	public function theShopAction(Request $request)
    {	    
        return $this->render('KACSiteBundle:Content:theShop.html.twig', array());
    }

    /**
     * @Route("/how-to-find-us.html", name="content_how_to_find_us")
     * @Route("/how-to-find-kitchen-appliance-centre-in-nottingham.html", name="content_how_to_find_us_long")
     */
	public function howToFindUsAction(Request $request)
    {  	
        return $this->render('KACSiteBundle:Content:howToFindUs.html.twig', array());
    }

    /**
     * @Route("/contact-us.html", name="content_contact_us", schemes={"https"}))
     * @Route("/contact-kitchen-appliance-centre.html", name="content_contact_us_long", schemes={"https"}))
     */
    public function contactUsAction(Request $request)
    {
        // Process the enquiry
        if ($request->getMethod() == 'POST')
        {
            // Get the entity manager
            $em = $this->getDoctrine()->getManager();

            // Get submitted data
            $departmentEmailAddress = ($request->request->get('enquiry')?$request->request->get('enquiry'):'sales@kitchenappliancecentre.co.uk');
            switch ($departmentEmailAddress)
            {
                case 'delivery@kitchenappliancecentre.co.uk':
                    $department = 'Delivery';
                    break;
                case 'customerservice@kitchenappliancecentre.co.uk':
                    $department = 'Customer Service';
                    break;
                default:
                case 'sales@kitchenappliancecentre.co.uk':
                    $department = 'Sales';
                    break;
            }
            $name = ucwords(trim($request->request->get('name')));
            $emailAddress = strtolower(trim($request->request->get('email-address')));
            $contactNumber = trim($request->request->get('contact-number'));
            $message = trim($request->request->get('message'));

            // Save the message
            $messageObject = new Message();
            $messageObject->setMessageType($department);
            $messageObject->setName($name);
            $messageObject->setEmailAddress($emailAddress);
            $messageObject->setContactNumber($contactNumber);
            $messageObject->setMessage($message);
            $messageObject->setPrinted('0');
            $messageObject->setViewed('0');
            $messageObject->setActioned('0');
            $em->persist($messageObject);
            $em->flush();

            // Send the message to the relevant department
            try
            {
                $email = \Swift_Message::newInstance();
                $email->setSubject($department.' Enquiry');
                $email->setFrom(array($emailAddress => $name));
                $email->setTo(array($departmentEmailAddress => 'Kitchen Appliance Centre - '.$department));
                $email->setBcc(array('acfstacey@gmail.com' => 'Adam Stacey'));
                $email->setBody($this->renderView('WebIlluminationShopBundle:System:message.html.twig', array('name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'message' => $message, 'title' => $department.' Enquiry')), 'text/html');
                $email->addPart($this->renderView('WebIlluminationShopBundle:System:message.txt.twig', array('name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'message' => $message)), 'text/plain');
                $this->get('mailer')->send($email);

                // Set success message
                $this->get('session')->getFlashBag()->add('success', 'Thank you for your enquiry. We will make every effort to respond to your enquiry as soon as possible.');
            } catch (\Exception $exception) {
                // Set error message
                $this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem sending your enquiry. Please try contacting us using an alternative method.');
            }

            // Forward to the contact us page
            return $this->redirect($this->get('router')->generate('content_contact_us', array()));
        }
        return $this->render('KACSiteBundle:Content:contactUs.html.twig', array());
    }
}