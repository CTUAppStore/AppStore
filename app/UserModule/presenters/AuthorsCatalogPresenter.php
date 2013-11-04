<?php

namespace UserModule;
/**
 * AuthorsCatalog presenter.
 */
//class AuthorsCatalogPresenter extends SignedPresenter - docasne zakomentovano, nez bude pristup do databaze
class AuthorsCatalogPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
