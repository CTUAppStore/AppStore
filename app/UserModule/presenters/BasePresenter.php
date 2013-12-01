<?php
namespace UserModule;
/**
 * Základní presenter od kterého dědí všechny ostatní presentery.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
	/** @brief BaseRepository repositář */
	protected $repository;
}
