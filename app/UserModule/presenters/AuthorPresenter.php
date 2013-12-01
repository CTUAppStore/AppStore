<?php

namespace UserModule;

/**
 * Author resenter.
 */
class AuthorPresenter extends SignedPresenter
{
	private $m_AuthorData;
	private $m_AuthorUsername;
	private $m_AuthorApps;

	/** @brief Start presenteru
	    @return void
	    */
	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	/** @brief Akce zobrazení
	    @param string Uživatelské jméno autora
	    @return void
	    */
	public function actionShow ( $username )
	{
		$this -> m_AuthorData = $this -> repository -> getAuthorData ( $username );
		$this -> m_AuthorApps = $this -> repository -> getAuthorApps ( $username );
	}

	/** @brief Vykreslí informace o autorovi
	    @return void
	    */
	public function renderShow ()
	{
		$this -> template -> AuthorData = $this -> m_AuthorData;
		$this -> template -> AuthorApps = $this -> m_AuthorApps;
	}

	/** @brief Vytvoří komponentu seznam aplikací autora
	    @return ApplicationsCatalogGrid
	    */
	protected function createComponentAppsList(){
	    return new ApplicationsCatalogGrid($this->m_AuthorApps);
	}

}
