<?php

namespace UserModule;
/**
 * ApplicationsCatalog presenter.
 */
class ApplicationsCatalogPresenter extends SignedPresenter
{
	private $m_AppList;

	public function startup ()
	{
		parent::startup ();
		$this ->  repository = $this -> context -> applicationRepository;
	}

	public function actionShow ()
	{
		$this -> m_AppList = $this -> repository -> getAppList ();
	}

	public function renderShow()
	{
		$this -> template -> appList = $this -> m_AppList;
	}

	protected function createComponentDataGrid(){
	    return new ApplicationsCatalogGrid($this->m_AppList);
	}
}
