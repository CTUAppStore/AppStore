<?php

namespace UserModule;


use Nette\Application\UI\Form;
/**
 * Application presenter.
 */
class ApplicationPresenter extends SignedPresenter
{
	private $m_AppData;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	public function actionShow ( $id )
	{
		$this -> m_AppData = $this -> repository -> getApplicationData ( $id );
	}

	public function renderShow ()
	{
		$this -> template -> AppData = $this -> m_AppData;
	}

	public function actionBuy ( $id )
	{

	}

	public function renderBuy ()
	{

	}

	public function createComponentBuyForm ()
	{

		$payment = array ( 'sms' => 'Pomocí SMS', 'bank' => 'Převodem', 'card' => 'Kartou');
		$form = new Form();

		$form -> addRadioList ( 'payment', 'Způsob platby:', $payment ) 
					-> setDefaultValue ( 'null' )
					-> addRule ( Form::FILLED, 'Vyberte prosím způsob platby.' )
					-> addCondition ( Form::EQUAL, $payment );
		$form -> addSubmit ( 'apply', 'Pokračovat' );
		$form -> onSuccess[] = $this -> buyFormSubmited;

		return $form;
	}

	public function buyFormSubmited ( $form )
	{

	}
}
