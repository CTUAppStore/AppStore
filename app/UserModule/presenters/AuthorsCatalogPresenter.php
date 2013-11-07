<?php

namespace UserModule;
/**
 * AuthorsCatalog presenter.
 */
class AuthorsCatalogPresenter extends SignedPresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
