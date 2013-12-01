<?php

use Nette\Application\UI;


namespace UserModule;

/**
 * Sign in/out presenter.
 */
abstract class SignedPresenter extends BasePresenter
{
    /** @brief Start presenteru
	@return void
	*/
    protected function startup()
    {
	parent::startup();

	if (!$this->getUser()->isLoggedIn())
	    $this->redirect(':User:Sign:in');
    }

    /** @brief Odhlásí uživatele
	@return void
	*/
    public function handleSignOut()
    {
        $this->getUser()->logout();
        $this->redirect('Sign:in');
    }
}
