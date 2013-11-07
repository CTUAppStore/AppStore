<?php

namespace UserModule;
/**
 * ApplicationsCatalog presenter.
 */
class ApplicationsCatalogPresenter extends SignedPresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
