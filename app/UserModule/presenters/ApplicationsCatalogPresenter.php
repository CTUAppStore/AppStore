<?php

namespace UserModule;
/**
 * Applications Catalog Presenter.
 */
class ApplicationsCatalogPresenter extends SignedPresenter
{
	private $m_AppList;

	/** @brief Start presenteru
	    @return void
	    */
	public function startup ()
	{
		parent::startup ();
		$this ->  repository = $this -> context -> applicationRepository;
	}

	/** @brief Akce zobrazení
	    @return void
	    */
	public function actionShow ()
	{
		$this -> m_AppList = $this -> repository -> getAppList ();
	}

	/** @brief Vykreslí seznam aplikací
	    @return void
	    */
	public function renderShow()
	{
		$this -> template -> appList = $this -> m_AppList;
	}

	/** @brief Vytvoří komponentu ApplicationsCatalogGrid
	    @return ApplicationsCatalogGrid
	    */
	protected function createComponentDataGrid(){
	    return new ApplicationsCatalogGrid($this->m_AppList);
	}
}
