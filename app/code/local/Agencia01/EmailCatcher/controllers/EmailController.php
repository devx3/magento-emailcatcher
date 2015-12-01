<?php 

class Agencia01_EmailCatcher_EmailController extends Mage_Core_Controller_Front_Action {

	private $mageCookie;
	private $mageSession;

	public function indexAction() {

		$mageCookie  = Mage::getModel('core/cookie');
		$mageSession = Mage::getModel('core/session');

		// Get the checkout URL 
		$url = Mage::getUrl('checkout/onepage', array('_secure'=>true));

		// If email and name cookies isset...
		if( $mageCookie->get(Agencia01_EmailCatcher_Model_Cookie::COOKIE_EMAIL) && 
			$mageCookie->get(Agencia01_EmailCatcher_Model_Cookie::COOKIE_NAME) ):

			// Set email session and proceed to checkout!
			$mageSession->setEmail(Agencia01_EmailCatcher_Model_Cookie::COOKIE_EMAIL);
			Mage::app()
				->getResponse()
				->setRedirect($url)
				->sendResponse();
		endif;

		// if not exists, only render the page with the form
		$this->loadLayout();
		$this->renderLayout();
		
		//Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());

	}

}