<?php

class Agencia01_EmailCatcher_Model_Observer {

	public function __construct() {}

	public function display_email_catcher($observer) {

			// If the email doesn't exist in session
			if( !Mage::getModel('core/session')->getEmail() ):
				// Call the emailcatcher page
				Mage::app()
					->getResponse()
					->setRedirect("/emailcatcher/email/")
					->sendResponse();
			endif;
	}

}