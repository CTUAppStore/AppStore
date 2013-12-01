<?php

namespace AuthorModule;
/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	/** @brief Vykreslí základní stránku
	    @return void
	*/
	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
