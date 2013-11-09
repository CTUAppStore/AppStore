<?php

namespace UserModule;


use Nette\Application\UI\Form;
/**
 * Application presenter.
 */
class ApplicationPresenter extends SignedPresenter
{
	private $m_AppData;
	private $m_AppLicenceInfo;
	private $m_AuthorName;
	private $m_AppPictures;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	public function actionShow ( $id )
	{
		$this -> m_AppData = $this -> repository -> getApplicationData ( $id );
		$this -> m_AuthorName = $this -> repository -> getAuthorName ( $id );
		$this -> m_AppLicenceInfo = $this -> repository -> getApplicationLicenceInfo ( $id );
		$this -> m_AppPictures = $this -> repository -> getApplicationPictures ( $id );
	}

	public function renderShow ()
	{
		$this -> template -> appData = $this -> m_AppData;
		$this -> template -> authorName = $this -> m_AuthorName;
		$this -> template -> licenceInfo = $this -> m_AppLicenceInfo;
		$this -> template -> appPictures = $this -> m_AppPictures;
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
