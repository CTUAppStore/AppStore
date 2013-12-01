<?php

namespace UserModule;

/**
 * Author presenter.
 */
class AuthorPresenter extends SignedPresenter
{
	private $m_AuthorData;
	private $m_AuthorUsername;
	private $m_AuthorApps;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	public function actionShow ( $username )
	{
		$this -> m_AuthorData = $this -> repository -> getAuthorData ( $username );
		$this -> m_AuthorApps = $this -> repository -> getAuthorApps ( $username );
	}

	public function renderShow ()
	{
		$this -> template -> AuthorData = $this -> m_AuthorData;
		$this -> template -> AuthorApps = $this -> m_AuthorApps;
	}

	protected function createComponentAppsList(){
	    return new ApplicationsCatalogGrid($this->m_AuthorApps);
	}

}
