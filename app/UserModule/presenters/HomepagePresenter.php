<?php

namespace UserModule;
/**
 * Homepage presenter.
 */
//class HomepagePresenter extends SignedPresenter - docasne zakomentovano, nez bude pristup do databaze
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
