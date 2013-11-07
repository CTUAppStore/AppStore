<?php

namespace UserModule;
/**
 * Homepage presenter.
 */
class HomepagePresenter extends SignedPresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
