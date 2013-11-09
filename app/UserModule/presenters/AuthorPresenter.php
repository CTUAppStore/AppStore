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

	public function actionShow ( $id )
	{
		$this -> m_AuthorData = $this -> repository -> getAuthorData ( $this -> m_AuthorUsername );
	}

	public function renderShow ()
	{
		$this -> template -> AuthorData = $this -> m_AuthorData;
	}

}
