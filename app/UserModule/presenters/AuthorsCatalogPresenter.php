<?php

namespace UserModule;
/**
 * AuthorsCatalog Presenter.
 */
class AuthorsCatalogPresenter extends SignedPresenter
{
	private $m_AuthorsList;

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
		$this -> m_AuthorsList =  $this -> repository -> getAuthorsList ();
	}

	/** @brief Vykreslí seznam autorů
	    @return void
	    */
	public function renderShow()
	{
		$this -> template -> authorsList = $this -> m_AuthorsList;
	}


	/** @brief Vytvoří komponentu seznam autorů
	    @return AuthorsCatalogGrid
	    */
	protected function createComponentDataGrid(){
	    return new AuthorsCatalogGrid($this->m_AuthorsList);
	}
}
