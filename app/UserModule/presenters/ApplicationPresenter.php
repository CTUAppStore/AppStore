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

	/** @brief Start presenteru
	    @return void
	    */
	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	/** @brief Akce zobrazení
	    @param int Id aplikace
	    @return void
	    */
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

	/** @brief Vykreslí detail aplikace
	    @return void
	    */
	public function renderShow ()
	{
		$this -> template -> appData = $this -> m_AppData;
		$this -> template -> authorName = $this -> m_AuthorName;
		$this -> template -> licenceInfo = $this -> m_AppLicenceInfo;
		$this -> template -> appPictures = $this -> m_AppPictures;
		$this -> template -> appComments = $this -> m_AppComments;
		$this -> template -> userLicence = $this -> m_UserLicence;
	}

	/** @brief Vytvoří komponentu vložit komentář
	    @return Nette\\Application\\UI\\Form
	    */
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

	/** @brief Callback při odeslání komentáře
	    @param Nette\Application\UI\Form Formulář
	    @return void
	    */
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

	/** @brief Akce koupě
	    @param int Id aplikace
	    @return void
	    */
	public function actionBuy ( $id )
	{

	}

	/** @brief Vykreslí akci koupě
	    @return void
	    */
	public function renderBuy ()
	{

	}

	/** @brief Vytvoří komponentu nákupní formulář
	    @return Nette\\Application\\UI\\Form
	    */
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

	/** @brief Callback při odeslání nákupního formuláře
	    @param Nette\Application\UI\Form Formulář
	    @return void
	    */
	public function buyFormSubmited ( $form )
	{

	}
}
