<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{            
    // Login
    public function loginAction(Request $request)
    {	
    	// If a user has attempted to login
    	if ($request->getMethod() == 'POST')
    	{
	    	// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
		   	
		   	// Get the submitted data
		   	$emailAddress = strtolower(trim($request->request->get('email-address')));
		   	$this->get('session')->set('adminSecurityLoginLastEmailAddress', $emailAddress);
		   	$password = trim($request->request->get('password'));
		   	
		   	// Find the user
		  	$userObject = $em->getRepository('WebIllumination\SiteBundle\Entity\User')->findOneBy(array('emailAddress' => $emailAddress));
		  	if (!$userObject)
		  	{
		  		// Set error message
		    	$this->get('session')->getFlashBag()->add('error', 'Sorry, we could not find your email address. Please try another email address.');
		
		    	return $this->redirect($this->get('router')->generate('admin_security_login'));
		  	}
		  	
		  	// Get the encoder factory
		   	$encoderFactory = $this->get('security.encoder_factory');
		   	
		  	// Generate the password to check
		  	$encoder = $encoderFactory->getEncoder($userObject);  
		  	$passwordToCheck = $encoder->encodePassword($password, $userObject->getSalt());
		  	if ($passwordToCheck != $userObject->getPassword())
		  	{
		  		// Set error message
		    	$this->get('session')->getFlashBag()->add('error', 'Sorry, the password you entered was incorrect. Please try again.');
		
		    	return $this->redirect($this->get('router')->generate('admin_security_login'));
		  	}
	   	    
	   	    // Authenticate the user
	   	    // TODO: Look at making user roles dynamic
    		$token = new UsernamePasswordToken($userObject, null, 'admin', array('ROLE_ADMIN'));
			$this->get('security.context')->setToken($token);
			$this->get('session')->set('_security_'.'admin', serialize($token));

			// Setup the session
			$admin = array();
			$user = array();
			$user['id'] = $userObject->getId();
			$user['contactId'] = $userObject->getContactId();
			$user['emailAddress'] = $userObject->getEmailAddress();
			$user['lastLoggedIn'] = $userObject->getLastLoggedIn();
			$admin['user'] = $user;
			
			// Update the last logged in date
			$userObject->setLastLoggedIn(new \DateTime());
			$em->persist($userObject);
			$em->flush();
			
			// Update the session
			$this->get('session')->set('admin', $admin);
						
			// Set success message
		   	$this->get('session')->getFlashBag()->add('success', 'Welcome back ..., you are now securely logged in. You last logged in on '.date("l, jS F Y h:ia", $user['lastLoggedIn']->getTimestamp()).'.');
			
			return $this->redirect($this->get('router')->generate('admin_products_index'));
    	}
		
		/*$em = $this->getDoctrine()->getEntityManager();
    	$encoderFactory = $this->get('security.encoder_factory');
    	$userObject = $em->getRepository('WebIlluminationAdminBundle:User')->find(3);
    	$encoder = $encoderFactory->getEncoder($userObject);
    	$userObject->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
    	$userObject->setPassword($encoder->encodePassword('madelaine12', $userObject->getSalt()));
    	$em->persist($userObject);
		$em->flush();*/
    	
    	$emailAddress = $this->get('session')->get('adminSecurityLogiNLastEmailAddress');
        return $this->render('WebIlluminationAdminBundle:Security:login.html.twig', array('emailAddress' => $emailAddress));
    }
    
    // Logout
    public function logoutAction()
    {	
    	// Log out the user
    	$this->get('security.context')->setToken(null);
		$this->get('request')->getSession()->invalidate();
		
		// Set success message
	    $this->get('session')->getFlashBag()->add('success', 'You have been safely and securely logged out.');
	    
    	return $this->redirect($this->get('router')->generate('admin_security_login'));
    }
    
}