<?php

namespace UserModule;

/**
 * Author presenter.
 */
class AuthorPresenter extends SignedPresenter
{
	private $m_AuthorData;
	private $m_AuthorUsername;

	protected function startup()
	{
		parent::startup();
		$this -> repository = $this -> context -> authorRepository;
	}

	public function actionShow ( $username )
	{
		$this -> m_AuthorData = $this -> repository -> getAuthorData ( $username );
	}

	public function renderShow ()
	{
		$this -> template -> AuthorData = $this -> m_AuthorData;
	}

}
