<?php

namespace UserModule;
/**
 * Homepage Presenter.
 */
class HomepagePresenter extends SignedPresenter
{

	/** @brief Vykreslí základní stránku
	    @return void
	*/
	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
