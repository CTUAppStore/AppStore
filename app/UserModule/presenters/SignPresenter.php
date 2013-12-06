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
		$form->addText('username', 'Uživatelské jméno:')
			->setRequired('Zadejte uživatelské jméno.');

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte heslo.');

		$form->addCheckbox('remember', 'Trvalé přihlášení');

		$form->addSubmit('send', 'Přihlásit');

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
