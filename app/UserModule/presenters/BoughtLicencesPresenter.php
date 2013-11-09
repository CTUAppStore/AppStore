<?php

namespace UserModule;
use  Nette\Security\User;
/**
 * BoughtLicences presenter.
 */
class BoughtLicencesPresenter extends SignedPresenter
{
	private $m_BoughtLicences;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	public function actionShow ()
	{
		$this -> m_BoughtLicences = $this -> repository -> getUserLicences ( $this -> getUser() -> getIdentity() -> username );
	}

	public function renderShow ()
	{
		$this -> template -> licences = $this -> m_BoughtLicences;
		$this -> template -> database = $this -> repository;
	}	

}