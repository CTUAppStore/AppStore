<?php

namespace UserModule;
/**
 * ApplicationsCatalog presenter.
 */
//class ApplicationsCatalogPresenter extends SignedPresenter - docasne zakomentovano, nez bude pristup do databaze
class ApplicationsCatalogPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
