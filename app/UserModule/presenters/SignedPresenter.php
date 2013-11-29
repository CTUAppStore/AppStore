<?php

use Nette\Application\UI;


namespace UserModule;

/**
 * Sign in/out presenters.
 */
abstract class SignedPresenter extends BasePresenter
{
    protected function startup(){
		parent::startup();

		if (!$this->getUser()->isLoggedIn())
			$this->redirect(':User:Sign:in');
    }

	public function handleSignOut()
	{
	    $this->getUser()->logout();
	    $this->redirect('Sign:in');
	}
}
