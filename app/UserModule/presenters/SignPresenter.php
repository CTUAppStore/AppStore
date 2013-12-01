<?php

use Nette\Application\UI;


namespace UserModule;

/**
 * Sign in/out presenter.
 */
class SignPresenter extends BasePresenter
{


	/**
	 * @brief Vytvoří komponentu přihlašovací formulář
	 * @return Nette\\Application\\UI\\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new \Nette\Application\UI\Form;
		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}


	/** @brief Callback při přihlášení
	    @param Nette\Application\UI\Form Formulář
	    @return void
	    */
	public function signInFormSucceeded($form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password, "uzivatel");
			$this -> flashMessage ( 'Byl jste úspěšně přihlášen.', 'success' );
			$this->redirect('Homepage:');

		} catch (\Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
