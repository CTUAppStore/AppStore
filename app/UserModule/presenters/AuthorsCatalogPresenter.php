<?php

namespace UserModule;
/**
 * AuthorsCatalog presenter.
 */
class AuthorsCatalogPresenter extends SignedPresenter
{
	private $m_AuthorsList;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> applicationRepository;
	}

	public function actionShow ()
	{
		$this -> m_AuthorsList =  $this -> repository -> getAuthorsList ();
	}

	public function renderShow()
	{
		$this -> template -> authorsList = $this -> m_AuthorsList;
	}


	protected function createComponentDataGrid(){
	    return new AuthorsCatalogGrid($this->m_AuthorsList);
	}
}
