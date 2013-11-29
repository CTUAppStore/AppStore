<?php

namespace UserModule;


use Nette\Application\UI\Form;
/**
 * Application presenter.
 */
class ApplicationPresenter extends SignedPresenter
{
	private $m_AppId;
	private $m_AppData;
	private $m_AppLicenceInfo;
	private $m_AuthorName;
	private $m_AppPictures;
	private $m_AppComments;
	private $m_UserLicence;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	public function actionShow ( $id )
	{
		$this -> m_AppId = $id;
		$this -> m_AppData = $this -> repository -> getApplicationData ( $id );
		$this -> m_AuthorName = $this -> repository -> getAuthorName ( $id );
		$this -> m_AppLicenceInfo = $this -> repository -> getApplicationLicenceInfo ( $id );
		$this -> m_AppPictures = $this -> repository -> getApplicationPictures ( $id );
		$this -> m_AppComments = $this -> repository -> getApplicationComments ( $id );
		$this -> m_UserLicence = $this -> repository -> getUserLicence ( $id, $this -> getUser () -> getIdentity () -> username );
	}

	public function renderShow ()
	{
		$this -> template -> appData = $this -> m_AppData;
		$this -> template -> authorName = $this -> m_AuthorName;
		$this -> template -> licenceInfo = $this -> m_AppLicenceInfo;
		$this -> template -> appPictures = $this -> m_AppPictures;
		$this -> template -> appComments = $this -> m_AppComments;
		$this -> template -> userLicence = $this -> m_UserLicence;
	}

	public function createComponentInsertCommentForm ()
	{
		$form = new Form ();

		$form -> addText ( 'title', 'Nadpis:' )
				-> addRule ( Form::FILLED, 'Nadpis musí být vyplněn.' );
		$form -> addTextArea ( 'comment', 'Komentář:' )
    			-> addRule ( Form::FILLED, 'Komentář musí být vyplněn.' );
    	$form -> addSubmit ( 'insertComment', 'Vložit' );
    	$form -> onSuccess[] = $this -> insertCommentFormSubmitted;

    	return $form;
	}

	public function insertCommentFormSubmitted ( $form )
	{
		$inserted = $this -> repository -> insertComment ( $this -> m_AppId, $form -> values -> title, $form -> values -> comment, $this -> getUser () -> getIdentity () -> username );

		if ( $inserted != FALSE )
		{
			$this -> flashMessage ( 'Komentář byl úspěšně vložen.', 'success' );
			$this -> redirect ( "this" );
		}
		else
		{
			$this -> flashMessage ( 'Komentář se nepodařilo vložit.', 'error' );
		}
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
