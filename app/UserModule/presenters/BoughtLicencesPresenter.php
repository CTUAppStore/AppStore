<?php

namespace UserModule;
use  Nette\Security\User;
/**
 * Bought Licences Presenter.
 */
class BoughtLicencesPresenter extends SignedPresenter
{
	private $m_BoughtLicences;

	/** @brief Start presenteru
	    @return void
	    */
	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	/** @brief Akce zobrazení
	    @return void
	    */
	public function actionShow ()
	{
		$this -> m_BoughtLicences = $this -> repository -> getUserLicences ( $this -> getUser() -> getIdentity() -> username );
	}

	/** @brief Vykreslí zakoupené licence
	    @return void
	    */
	public function renderShow ()
	{
		$this -> template -> licences = $this -> m_BoughtLicences;
		$this -> template -> database = $this -> repository;
	}	

}